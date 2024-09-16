<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Crypt;

class CategoryService
{
    public function  fetch($requestData,$columns)
    {
        $query = Category::select($columns);
        if(getCurrentUserRoleName() === 'SubAdmin'){
            $query = $query->where('country_id',auth()->user()->country);
        }
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('title', 'LIKE', '%' . $searchValue . '%')
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
        $categoryArr = [
            'country_id' => $requestData['country_id'],
            'title' => Crypt::encryptString($requestData['title']),
            'status' => $requestData['status'],
        ];
        $category = Category::create($categoryArr);
        return $category;
    }
    public function update($category, $requestData)
    {        
        $categoryArr = [
            'country_id' => $requestData['country_id'],
            'title' => Crypt::encryptString($requestData['title']),
            'status' => $requestData['status'],
        ];      
        return $category->update($categoryArr);      
    }
    public function delete($category)
    {
        $category->delete();
        return $category;
    }
}
