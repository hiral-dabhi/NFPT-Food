<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CurrencyService
{
    public function fetch($requestData,$columns)
    {
        $query = Currency::select($columns);
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('title', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('sign', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('country_id', 'LIKE', '%' . $searchValue . '%')
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
    public function store($requestData,$filename)
    {
        $currencyArr = [
            'title' => $requestData['title'],
            'country_id' => $requestData['country_id'],
            'sign' => $requestData['sign'],
            'image' => $filename,
            'status' => $requestData['status'],
        ];
        $currency = Currency::create($currencyArr);
        return $currency;
    }
    public function update($currency, $requestData,$filename)
    {
        $currencyArr = [
            'title' => $requestData['title'],
            'country_id' => $requestData['country_id'],
            'sign' => $requestData['sign'],
            'image' => $filename,
            'status' => $requestData['status'],
        ];      
        return $currency->update($currencyArr);      
    }
    public function delete($currency)
    {
        $currency->delete();
        return $currency;
    }
}
