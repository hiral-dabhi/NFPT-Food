<?php

namespace App\Services;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CountryService
{
    public function fetch($requestData,$columns)
    {
        $query = Country::select($columns);
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('id', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $searchValue . '%');
            });
        }
        $total = $query->count();

        $orderByColumn = $columns[$requestData['order'][0]['column']];
        $orderDirection = $requestData['order'][0]['dir'];
        $query->orderBy($orderByColumn, $orderDirection);

        $start = $requestData['start'];
        $length = $requestData['length'];
        $query->skip($start)->take($length);

        $filteredCount = $query->count();
        $data = $query->get();

        return [
            'data' => $data,
            'total' => $total,
            'filteredCount' => $filteredCount,
        ];
    }
    public function store($requestData)
    {
        $countryArr = [
            'name' => $requestData['name'],
            'status' => $requestData['status'],
        ];
        $country = Country::create($countryArr);
        return $country;
    }
    public function update($country, $requestData)
    {
        $countryArr = [
            'name' => $requestData['name'],            
            'status' => $requestData['status'],
        ];        
        return $country->update($countryArr);      
    }
    public function delete($country)
    {
        $country->delete();
        return $country;
    }
}
