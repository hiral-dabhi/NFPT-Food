<?php

namespace App\Services;

use App\Models\RestaurantMaster;
use App\Models\StaffHasRestaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Permission\Models\Role;

class RestaurantStaffService
{
    public function fetch($requestData,$columns)
    {
        $query = User::role('restaurantStaff','restaurantDetail')->where('user_type','2');
        if(getCurrentUserRoleName() === 'RestaurantUser'){
            $query = $query->where('user_id',auth()->user()->id);
        }
        if(getCurrentUserRoleName() === 'SubAdmin'){
            $query = $query->whereHas('staffRestaurant.restaurantDetail', function ($query) {
                $query->where('country', auth()->user()->country);
            });
        }
        
    
        if (! empty($requestData['search']['value'])) {
            $searchValue = $requestData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('id', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchValue . '%')
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
        if(getCurrentUserRoleName() === 'SuperAdmin'){
            $userId = RestaurantMaster::find($requestData['restaurant_id'])->user_id ?? '';
        }else{
            $userId = auth()->user()->id;
        }      
        $userArr = [
            'firstname' => Crypt::encryptString($requestData['firstname']),
            'lastname' => Crypt::encryptString($requestData['lastname']),
            'email' => $requestData['email'],
            'contact_number' => $requestData['contact_number'],
            'user_id'=> $userId,
            'user_type'=> '2',
            'password' => Hash::make($requestData['password']),
        ];
        $user = User::create($userArr);
        $user->assignRole('restaurantStaff');

        StaffHasRestaurant::create([
            'staff_id'=> $user->id,
            'restaurant_id'=> $requestData['restaurant_id'],
        ]);

        return $user;
    }
    public function update($user, $requestData)
    {
        $userArr = [
            'firstname' => Crypt::encryptString($requestData['firstname']),
            'lastname' => Crypt::encryptString($requestData['lastname']),
            'email' => $requestData['email'],
            'contact_number' => $requestData['contact_number'],
            'password' => Hash::make($requestData['password']),
        ];   
        $user->update($userArr);   

        StaffHasRestaurant::where('staff_id',$user->id)->delete();
        StaffHasRestaurant::create([
            'staff_id'=> $user->id,
            'restaurant_id'=> $requestData['restaurant_id'],
        ]);

    }
    public function delete($user)
    {
        $user->delete();
        StaffHasRestaurant::where('staff_id',$user->id)->delete();
        return $user;
    }
}
