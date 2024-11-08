<?php

namespace App\Services;

use App\Models\SubCategory;
use App\Models\Menu;
use App\Models\RestaurantMaster;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MenuService
{
    public function  fetch($requestData, $columns)
    {
        $restaurant = auth()->user()->hasRole('BusinessOwner') ? auth()->user()->restaurantDetail :  auth()->user()->staffRestaurant->restaurantDetail ?? null;
        $businessId = $restaurant->id ?? null;
        if (isset($requestData['businessId'])) {
            $businessId = $requestData['businessId'];
        }
        $query = Menu::with('subCategoryDetail')->where('restaurant_id', $businessId)->select($columns);
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
    public function store($requestData, $fileName)
    {
        if(!empty($requestData['business_id'])){
            $business = RestaurantMaster::find($requestData['business_id']);
            if(empty($business)){
                return redirect()->back();
            }
            $restaurantId = $requestData['business_id'];
        }else{
            $restaurant = auth()->user()->hasRole('BusinessOwner') ? auth()->user()->restaurantDetail :  auth()->user()->staffRestaurant->restaurantDetail ?? null;
            $restaurantId = $restaurant->id;
        }
        $menuArr = [
            'restaurant_id' => $restaurantId ?? '',
            'category_id' => $requestData['category_id'],
            'sub_category_id' => $requestData['sub_category_id'],
            'title' => Crypt::encryptString($requestData['title']),
            'price' => $requestData['price'],
            'image' => $fileName,
            'status' => $requestData['status'],
            'tag' => $requestData['tag'],
            'type' => $requestData['type'],
            'description' => $requestData['description'],
            'in_stock' => $requestData['in_stock'],
        ];
        $menu = Menu::create($menuArr);
        return $menu;
    }
    public function update($menu, $requestData, $fileName)
    {
        $menuArr = [
            'category_id' => $requestData['category_id'],
            'sub_category_id' => $requestData['sub_category_id'],
            'description' => $requestData['description'],
            'title' => Crypt::encryptString($requestData['title']),
            'status' => $requestData['status'],
            'price' => $requestData['price'],
            'tag' => $requestData['tag'],
            'in_stock' => $requestData['in_stock'],
            'type' => $requestData['type'],
            'image' => $fileName,
        ];
        return $menu->update($menuArr);
    }
    public function delete($menu)
    {
        $menu->delete();
        return $menu;
    }
}
