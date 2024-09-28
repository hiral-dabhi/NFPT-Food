<?php

namespace App\Services;

use App\Models\Orders;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function  fetch($requestData, $columns)
    {
        $query = Orders::select($columns)->with('UserDetail:id,firstname,lastname');
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where('id', 'like', "%$searchValue%")
                ->orWhere('total_amount', 'like', "%$searchValue%")
                ->orWhere('payment_mode', 'like', "%$searchValue%")
                ->orWhere('payment_status', 'like', "%$searchValue%")
                ->orWhere('order_status', 'like', "%$searchValue%")
                ->orWhereHas('user', function ($userQuery) use ($searchValue) {
                    $userQuery->where('firstname', 'like', "%$searchValue%");
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
