<?php

namespace App\Services;

use App\Models\RestaurantMaster;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RestaurantService
{
    public function fetch($requestData, $columns)
    {
        $query = RestaurantMaster::where('type', '0');
        if (getCurrentUserRoleName() === 'RestaurantUser') {
            $query = $query->where('user_id', auth()->user()->id);
        }
        if (getCurrentUserRoleName() === 'SubAdmin') {
            $query = $query->where('country', auth()->user()->country);
        }
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('id', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('city', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('country', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('zip_code', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('contact_number', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('address', 'LIKE', '%' . $searchValue . '%');
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
        if (getCurrentUserRoleName() === 'SuperAdmin') {
            $userId = $requestData['user_id'];
        } else {
            $userId = auth()->user()->id;
        }
        $restaurantArr = [
            'name' => Crypt::encryptString($requestData['name']),
            'user_id' => $userId,
            'type' => '1',
            'email' => $requestData['email'],
            'address' => $requestData['address'],
            'city' => $requestData['city'],
            'country' => $requestData['country'],
            'state' => $requestData['state'],
            'zip_code' => $requestData['zip_code'],
            'open_at' => $requestData['open_at'],
            'status' => $requestData['status'],
            'close_at' => $requestData['close_at'],
            'contact_number' => $requestData['contact_number'],
            'description' => $requestData['description']
        ];

        return RestaurantMaster::create($restaurantArr);
    }
    public function update($restaurantMaster, $requestData)
    {
        $restaurantArr = [
            'name' => Crypt::encryptString($requestData['name']),
            'email' => $requestData['email'],
            'address' => $requestData['address'],
            'city' => $requestData['city'],
            'state' => $requestData['state'],
            'country' => $requestData['country'],
            'status' => $requestData['status'],
            'zip_code' => $requestData['zip_code'],
            'open_at' => $requestData['open_at'],
            'close_at' => $requestData['close_at'],
            'contact_number' => $requestData['contact_number'],
            'description' => $requestData['description'],
        ];

        return $restaurantMaster->update($restaurantArr);
    }
    public function delete($restaurant)
    {
        $restaurant->delete();
        return $restaurant;
    }

    public function fetchOwner($requestData, $columns)
    {
        $query = User::role('restaurantUser');
        if (getCurrentUserRoleName() === 'SubAdmin') {
            $query = $query->where('country', auth()->user()->country);
        }
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('id', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('city', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('country', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('zip_code', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('contact_number', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('address', 'LIKE', '%' . $searchValue . '%');
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
    public function storeOwner($requestData)
    {
        $userArr = [
            'firstname' => Crypt::encryptString($requestData['firstname']),
            'lastname' => Crypt::encryptString($requestData['lastname']),
            'email' => $requestData['email'],
            'address' => $requestData['address'],
            'city' => $requestData['city'],
            'state' => $requestData['state'],
            'country' => $requestData['country'],
            'zipcode' => $requestData['zip_code'],
            'contact_number' => $requestData['contact_number'],
            'password' => Hash::make($requestData['password']),
        ];
        $user = User::create($userArr);
        $user->assignRole('restaurantUser');

        RestaurantMaster::create([
            'user_id' => $user->id,
            'name' => Crypt::encryptString($requestData['business_name']),
            'address' => $requestData['address'],
            'state' => $requestData['state'],
            'city' => $requestData['city'],
            'zip_code' => $requestData['zip_code'],
            'country' => $requestData['country'],
            'email' => $requestData['business_email'],
            'contact_number' => $requestData['business_contact'],
        ]);

        return $user;
    }
    public function updateOwner($user, $requestData)
    {
        $userArr = [
            'firstname' => Crypt::encryptString($requestData['firstname']),
            'lastname' => Crypt::encryptString($requestData['lastname']),
            'email' => $requestData['email'],
            'address' => $requestData['address'],
            'city' => $requestData['city'],
            'state' => $requestData['state'],
            'country' => $requestData['country'],
            'zipcode' => $requestData['zip_code'],
            'contact_number' => $requestData['contact_number'],
            'password' => Hash::make($requestData['password']),
        ];
        $user->update($userArr);
        $restauranrArr = [
            'name' => Crypt::encryptString($requestData['business_name']),
            'address' => $requestData['address'],
            'city' => $requestData['city'],
            'zip_code' => $requestData['zip_code'],
            'country' => $requestData['country'],
            'state' => $requestData['state'],
            'email' => $requestData['business_email'],
            'contact_number' => $requestData['business_contact'],
        ];

        $user->restaurantDetail()->update($restauranrArr);
    }
    public function deleteOwner($user)
    {
        $restaurant = $user->restaurantDetail;
        if ($restaurant) {
            $restaurant->menus()->delete();
            $restaurant->delete();
        }    
        $user->delete();    
        return $user;
    }
}