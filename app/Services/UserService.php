<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function fetch($requestData,$columns)
    {
        $query = User::role('Client/Customer');
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('id', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('contact_number', 'LIKE', '%' . $searchValue . '%')
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
        $userArr = [
            'firstname' => Crypt::encryptString($requestData['firstname']),
            'lastname' => Crypt::encryptString($requestData['lastname']),
            'email' => $requestData['email'],
            'status' => $requestData['status'],
            'contact_number' => $requestData['contact_number'],
            'password' => Hash::make($requestData['password']),
        ];
        $user = User::create($userArr);
        $user->assignRole('User');
        return $user;
    }
    public function update($user, $requestData)
    {
        $userArr = [
            'firstname' => Crypt::encryptString($requestData['firstname']),
            'lastname' => Crypt::encryptString($requestData['lastname']),
            'email' => $requestData['email'],
            'status' => $requestData['status'],
            'password' => Hash::make($requestData['password']),
            'contact_number' => $requestData['contact_number'],
        ];        
        return $user->update($userArr);      
    }
    public function delete($user)
    {
        $user->delete();
        return $user;
    }
}
