<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserBankDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Permission\Models\Role;

class ProfileService
{
    public function updateProfile($requestData)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $userArr = [
            'name' => Crypt::encryptString($requestData['name']),
            'email' => $requestData['email'],
            'address' => $requestData['address'],
            'city' => $requestData['city'],
            'contact_number' => $requestData['contact_number'],
            'zipcode' => $requestData['zip_code'],
            'state' => $requestData['state'],
            'country' => $requestData['country'],
        ];
        $user->update($userArr);
        return $user;
    }

    public function updateProfessionalProfile($requestData)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $userArr = [
            'name' => Crypt::encryptString($requestData['name']),
            'email' => $requestData['email'],
            'address' => $requestData['address'],
            'city' => $requestData['city'],
            'state' => $requestData['state'],
            'country' => $requestData['country'],
            'zipcode' => $requestData['zip_code'],
            'contact_number' => $requestData['contact_number'],
            'password' => Hash::make($requestData['contact_number']),
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
        return $user;
    }

    public function updateBankDetails($requestData)
    {
        $bankArr = [
            'user_id' => auth()->user()->id,
            'account_number' => Crypt::encryptString($requestData['account_number']),
            'account_holder_name' => Crypt::encryptString($requestData['account_holder_name']),
            'bank_name' => Crypt::encryptString($requestData['bank_name']),
            'bank_address' => Crypt::encryptString($requestData['bank_address']),
            'branch_number' => Crypt::encryptString($requestData['branch_number']),
            'institute_number' => Crypt::encryptString($requestData['institute_number']),
            'routing_number' => Crypt::encryptString($requestData['routing_number']),
            'swift_bic_code' => Crypt::encryptString($requestData['swift_bic_code']),
        ];

        $conditions = [
            'user_id' => auth()->user()->id,
        ];

        // Use updateOrCreate method
        return UserBankDetail::updateOrCreate($conditions, $bankArr);
    }
    public function updateDocumentDetails($user, $requestData, $fileName)
    {
        $documentArr = [
            'document_name' => $requestData['document_name'],
            'document_file' => $fileName,
        ];
        $user->update($documentArr);
    }
}
