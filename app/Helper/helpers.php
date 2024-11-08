<?php

use App\Models\Currency;
use App\Models\EmailNotificationSetting;
use App\Services\GeneralService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

if (!function_exists('editBtn')) {
    function editBtn($url)
    {
        return '<a class="text-white btn bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 mr-2" title="Edit" href=' . $url . '><i class="fas fa-pencil-alt" title="Edit"></i></a>';
    }
}
if (!function_exists('viewBtn')) {
    function viewBtn($url)
    {
        return '<a class="text-white btn bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 mr-2" title="Edit" href=' . $url . '><i class="fas fa-eye" title="Edit"></i></a>';
    }
}

if (!function_exists('downloadBtn')) {
    function downloadBtn($url)
    {
        return '<a class="ml-2 text-white btn bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 mr-2" title="Download" href=' . $url . '><i class="fa fa-download" title="Download"></i></a>';
    }
}

if (!function_exists('deleteBtn')) {
    function deleteBtn($url)
    {
        return '
            <form action="' . $url . '" method="POST" onsubmit="return confirmSweetAlertDelete(this);">
                ' . method_field('DELETE') . csrf_field() . '
                <button type="submit" title="Delete" class="text-white bg-red-500 border-red-500 btn hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-500/30 active:bg-red-600 active:border-red-600">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
            <script>
                function confirmSweetAlertDelete(form) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won\'t be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if the user confirms
                        } else {
                            // User cancelled, do nothing or show a message
                            Swal.fire("Cancelled", "Your data is safe!", "info");
                        }
                    });

                    return false; // Prevent the default form submission
                }
            </script>';
    }
}

if (!function_exists('printBtn')) {
    function printBtn($url)
    {
        return '<form action="' . $url . '" method="POST" target="_blank">
            ' . csrf_field() . '
            <button type="submit" class="text-white bg-violet-500 border-violet-500 btn hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600"><i class="fas fa-print text-white"></i></button>
        </form>';
    }
}

if (!function_exists('getCurrentUserRoleName')) {
    function getCurrentUserRoleName()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return $user->userRole->first()->name ?? '';
            // return 'SuperAdmin';
        }
    }
}
if (!function_exists('getCurrentUserRoleDesc')) {
    function getCurrentUserRoleDesc()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return $user->userRole->first()->description ?? '';
            // return 'SuperAdmin';
        }
    }
}

if (!function_exists('getRestaurantName')) {
    function getRestaurantName()
    {
        if (getCurrentUserRoleName() == 'BusinessOwner') {
            $user = Auth::user();
            return '- ' . ucfirst(Crypt::decryptString($user->restaurantMasterDetail->name)) ?? '';
        }
        if (getCurrentUserRoleName() == 'RestaurantStaff') {
            $user = Auth::user();
            return '- ' . ucfirst(Crypt::decryptString($user->staffRestaurant->restaurantDetail->name)) ?? '';
        }
    }
}

if (!function_exists('getRoles')) {
    function getRoles()
    {
        return Role::whereNot('roles.name', 'Subscriber')->pluck('name')->toArray();
    }
}
function getCurrency(){
    $authUser = Auth::guard('customer')->user() ?? Auth::guard('web')->user();
    if(!empty($authUser)){
        $currancy = Currency::where('country_id',$authUser->country)->first();
        if(!empty($currancy)){
            return $currancy->sign ?? '';
        }
    }
    return env('CURRENCY');
}