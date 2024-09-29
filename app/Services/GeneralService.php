<?php

namespace App\Services;

use App\Events\SendEmailEvent;
use App\Events\SMSLogsEvent;
use App\Models\Category;
use App\Models\Config;
use App\Models\Country;
use App\Models\Currency;
use App\Models\SubCategory;
use App\Models\EmailNotification;
use App\Models\Invoice;
use App\Models\IpPoolHasOperator;
use App\Models\IpV4;
use App\Models\Ipv4Address;
use App\Models\IPv4HasOperator;
use App\Models\IpV6;
use App\Models\Language;
use App\Models\MiscCategory;
use App\Models\Nas;
use App\Models\PrefixLength;
use App\Models\Service;
use App\Models\SmsNotification;
use App\Models\User;
use App\Models\UserAuthlogs;
use App\Models\UserCredits;
use App\Models\UserDeposit;
use App\Models\UserDetails;
use App\Models\UserHasNas;
use App\Models\UserHasService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\RadiusAcct;
use App\Models\RestaurantMaster;
use Illuminate\Support\Facades\Crypt;

class GeneralService
{
    public function getRoleList()
    {
        return Role::whereNotIn('name', ['SuperAdmin', 'Subscriber'])->pluck('description', 'name')->toArray();
    }

    public function getCurrentUserRoleName($user)
    {
        return $user->userRole->first()->name ?? '';
    }

    public function getPermissionList($type)
    {
        return Permission::where('type', $type)->get();
    }

    public function getUserList($type)
    {
        return User::role($type)->get()->mapWithKeys(function ($user) {
            $firstname = Crypt::decryptString($user->firstname);
            $lastname = Crypt::decryptString($user->lastname);
            $fullName = $firstname . ' ' . $lastname;
    
            return [$user->id => $fullName];
        })->toArray();
    }

    public function getRestaurantList()
    {
        if (getCurrentUserRoleName() === 'BusinessOwner') {
            return RestaurantMaster::where('user_id', auth()->user()->id)->pluck('name', 'id')->toArray();
        }
        return RestaurantMaster::pluck('name', 'id')->toArray();
    }

    public function getCountryList()
    {
        $countryList =  Country::pluck('name', 'id')->toArray();
        if (getCurrentUserRoleName() === 'SubAdmin' && !empty(auth()->user()->country)) {
            $countryList =  Country::where('id', auth()->user()->country)->pluck('name', 'id')->toArray();
        }
        return $countryList;
    }
    public function getCategoryList()
    {
        return Category::pluck('title', 'id')->toArray();
    }



    // public function smsAlert($user, $type, $replacements)
    // {
    //     $template = SmsNotification::where('title_code', $type)->first();

    //     if (!empty($template) && (!empty($user->userDetail->mobile_no) && ($user->userDetail->sms_alert === '1') || $type === 'create_user')) {
    //         $smsData = [
    //             'user_id' => $user->id,
    //             'subject' => $template->title ?? '',
    //             'sms_type' => $type,
    //             'mobile_no' => $user->userDetail->mobile_no,
    //             'message' => str_replace(array_keys($replacements), array_values($replacements), $template->description),
    //         ];
    //         return event(new SMSLogsEvent($smsData));
    //     }
    // }

    // public function emailAlert($user, $type, $replacements)
    // {
    //     $template = EmailNotification::where('title_code', $type)->first();

    //     if (!empty($template) && (!empty($user->email) && ($user->userDetail->email_alert === '1') || $type === 'create_user')) {
    //         $emailBody = str_replace(array_keys($replacements), array_values($replacements), $template->description);

    //         $mailData = [
    //             'template_content' => $template->description,
    //             'subject' => $template->title ?? '',
    //             'email' => $user->email,
    //             'email_body' => $emailBody,
    //         ];

    //         event(new SendEmailEvent($mailData));
    //     }
    // }
}
