<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RestaurantMaster;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $user =  User::create([
            'name' => Crypt::encryptString($data['name']),
            'email' => $data['email'],
            'contact_number' => $data['contact'],
            'password' => Hash::make($data['password']),
        ]);
        if ($user) {
            $user->assignRole($data['role_id']);
            if ($data['role_id'] == 'RestaurantUser') {
                $user->update([
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'zip_code' => $data['zip_code'],
                    'country' => $data['country_id'],
                ]);
                RestaurantMaster::create([
                    'user_id' => $user->id,
                    'name' => Crypt::encryptString($data['restaurant_name']),
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'email' => $data['restaurant_email'],
                    'zip_code' => $data['zip_code'],
                    'country' => $data['country_id'],
                    'contact_number' => $data['restaurant_contact'],
                ]);
            }
        }
        return $user;
    }
}
