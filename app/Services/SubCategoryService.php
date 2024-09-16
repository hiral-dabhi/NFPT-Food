<?php

namespace App\Services;

use App\Models\SubCategory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class SubCategoryService
{
    public function  fetch($requestData,$columns)
    {
        $query = SubCategory::select($columns);
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->filter(function ($user) use ($searchValue) {
                return (strpos(Crypt::decryptString($user->title), $searchValue) !== false) ||
                       (strpos($user->id, $searchValue) !== false) ||
                       (strpos($user->created_at, $searchValue) !== false);
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
        $dishArr = [
            'category_id' => $requestData['category_id'],
            'title' => Crypt::encryptString($requestData['title']),
            'status' => $requestData['status'],
            
        ];
        $SubCategory = SubCategory::create($dishArr);
        return $SubCategory;
    }
    public function update($dish, $requestData)
    {        
        $dishArr = [
            'category_id' => $requestData['category_id'],
            'description' => $requestData['description'],
            'title' => Crypt::encryptString($requestData['title']),
            'status' => $requestData['status'],
            'tag' => $requestData['tag'],
            'type' => $requestData['type'],
        ];      
        return $dish->update($dishArr);      
    }
    public function delete($SubCategory)
    {
        $SubCategory->delete();
        return $SubCategory;
    }
}
