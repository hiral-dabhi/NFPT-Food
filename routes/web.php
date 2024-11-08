<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CurrencyController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\RestaurantController;
use App\Http\Controllers\Backend\RestaurantStaffController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SubAdminController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\BusinessController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\HomeController as UserHomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/admin', function () {
    return view('welcome');
})->name('home');
Route::get('/clear-cache', function () {
    // Clear the application cache
    Artisan::call('cache:clear');
    return "Application cache cleared!";
});

Route::get('/config-cache', function () {
    // Clear and cache the configuration
    Artisan::call('config:cache');
    return "Configuration cache cleared!";
});
Auth::routes();
Route::middleware(['web'])->group(function () {
    Route::middleware('auth')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
            Route::prefix('role')->name('role.')->group(function () {
                Route::get('/', [RoleController::class, 'index'])->name('index');
                Route::post('/fetch', [RoleController::class, 'fetch'])->name('fetch');
                Route::get('/create', [RoleController::class, 'create'])->name('create');
                Route::post('/', [RoleController::class, 'store'])->name('store');
                Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
                Route::post('/{role}', [RoleController::class, 'update'])->name('update');
                Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('sub-admin')->name('subAdmin.')->group(function () {
                Route::get('/', [SubAdminController::class, 'index'])->name('index');
                Route::post('/fetch', [SubAdminController::class, 'fetch'])->name('fetch');
                Route::get('/create', [SubAdminController::class, 'create'])->name('create');
                Route::post('/', [SubAdminController::class, 'store'])->name('store');
                Route::get('/{user}/edit', [SubAdminController::class, 'edit'])->name('edit');
                Route::post('/{user}', [SubAdminController::class, 'update'])->name('update');
                Route::delete('/{user}', [SubAdminController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('country')->name('country.')->group(function () {
                Route::get('/', [CountryController::class, 'index'])->name('index');
                Route::post('/fetch', [CountryController::class, 'fetch'])->name('fetch');
                Route::get('/create', [CountryController::class, 'create'])->name('create');
                Route::post('/', [CountryController::class, 'store'])->name('store');
                Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('edit');
                Route::post('/{country}', [CountryController::class, 'update'])->name('update');
                Route::delete('/{country}', [CountryController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('currency')->name('currency.')->group(function () {
                Route::get('/', [CurrencyController::class, 'index'])->name('index');
                Route::post('/fetch', [CurrencyController::class, 'fetch'])->name('fetch');
                Route::get('/create', [CurrencyController::class, 'create'])->name('create');
                Route::post('/', [CurrencyController::class, 'store'])->name('store');
                Route::get('/{currency}/edit', [CurrencyController::class, 'edit'])->name('edit');
                Route::post('/{currency}', [CurrencyController::class, 'update'])->name('update');
                Route::delete('/{currency}', [CurrencyController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('profile')->name('profile.')->group(function () {
                Route::get('/', [ProfileController::class, 'profile'])->name('profile');
                Route::post('/', [ProfileController::class, 'updateProfile'])->name('update');
            });
            Route::prefix('professional-profile')->name('professionalProfile.')->group(function () {
                Route::get('/', [ProfileController::class, 'professionalProfile'])->name('profile');
                Route::post('/', [ProfileController::class, 'updateProfessionalProfile'])->name('update');
                Route::get('/bank-detail', [ProfileController::class, 'professionalBankDetail'])->name('bank-detail');
                Route::post('/bank-detail-update', [ProfileController::class, 'updateBankDetails'])->name('bank-detail.update');
                Route::get('/document', [ProfileController::class, 'professionalDocument'])->name('document');
                Route::post('/{user}/document-update', [ProfileController::class, 'updateDocumentDetails'])->name('document.update');
            });
            Route::prefix('user')->name('user.')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('index');
                Route::post('/fetch', [UserController::class, 'fetch'])->name('fetch');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/', [UserController::class, 'store'])->name('store');
                Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
                Route::post('/{user}', [UserController::class, 'update'])->name('update');
                Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('category')->name('category.')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::post('/fetch', [CategoryController::class, 'fetch'])->name('fetch');
                Route::get('/create', [CategoryController::class, 'create'])->name('create');
                Route::post('/', [CategoryController::class, 'store'])->name('store');
                Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
                Route::post('/{category}', [CategoryController::class, 'update'])->name('update');
                Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('subCategory')->name('subCategory.')->group(function () {
                Route::post('/fetch-countryname', [SubCategoryController::class, 'getCountryName'])->name('getCountryName');
                Route::get('/', [SubCategoryController::class, 'index'])->name('index');
                Route::post('/fetch', [SubCategoryController::class, 'fetch'])->name('fetch');
                Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
                Route::post('/', [SubCategoryController::class, 'store'])->name('store');
                Route::get('/{subCategory}/edit', [SubCategoryController::class, 'edit'])->name('edit');
                Route::post('/{subCategory}', [SubCategoryController::class, 'update'])->name('update');
                Route::delete('/{subCategory}', [SubCategoryController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('orders')->name('orders.')->group(function () {
                Route::get('/', [OrdersController::class, 'index'])->name('index');
                Route::post('/fetch', [OrdersController::class, 'fetch'])->name('fetch');
                Route::get('/create', [OrdersController::class, 'create'])->name('create');
                Route::post('/', [OrdersController::class, 'store'])->name('store');
                Route::get('/{orders}/edit', [OrdersController::class, 'edit'])->name('edit');
                Route::post('/{orders}', [OrdersController::class, 'update'])->name('update');
                Route::delete('/{orders}', [OrdersController::class, 'destroy'])->name('destroy');
                Route::post('/status-update/{orders}', [OrdersController::class, 'updateStatus'])->name('status.update');
            });

            Route::prefix('menu')->name('menu.')->group(function () {
                Route::post('/fetch-dish', [MenuController::class, 'getSubCategory'])->name('getSubCategory');
                Route::get('/', [MenuController::class, 'index'])->name('index');
                Route::post('/fetch', [MenuController::class, 'fetch'])->name('fetch');
                Route::get('/create/{restaurant?}', [MenuController::class, 'create'])->name('create');
                Route::post('/', [MenuController::class, 'store'])->name('store');
                Route::get('/{menu}/edit', [MenuController::class, 'edit'])->name('edit');
                Route::post('/{menu}', [MenuController::class, 'update'])->name('update');
                Route::delete('/{menu}', [MenuController::class, 'destroy'])->name('destroy');
            });
        });

        Route::prefix('restaurant')->group(function () {
            Route::prefix('sub-restaurant')->name('subRestaurant.')->group(function () {
                Route::get('/', [RestaurantController::class, 'index'])->name('index');
                Route::post('/fetch', [RestaurantController::class, 'fetch'])->name('fetch');
                Route::get('/create', [RestaurantController::class, 'create'])->name('create');
                Route::post('/', [RestaurantController::class, 'store'])->name('store');
                Route::get('/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('edit');
                Route::post('/{restaurant}', [RestaurantController::class, 'update'])->name('update');
                Route::delete('/{restaurant}', [RestaurantController::class, 'destroy'])->name('destroy');
                Route::get('/business-address/{restaurant}', [RestaurantController::class, 'businessAddress'])->name('businessAddress');
                Route::post('/update/business-address/{restaurant}', [RestaurantController::class, 'updateBusinessAddress'])->name('businessAddress.update');
                Route::get('/menu/{restaurant}', [RestaurantController::class, 'menuList'])->name('menu.list');
            });
            Route::prefix('restaurant-owner')->name('restaurantOwner.')->group(function () {
                Route::get('/', [RestaurantController::class, 'restaurantOwnerIndex'])->name('index');
                Route::post('/fetch', [RestaurantController::class, 'restaurantOwnerFetch'])->name('fetch');
                Route::get('/create', [RestaurantController::class, 'restaurantOwnerCreate'])->name('create');
                Route::post('/', [RestaurantController::class, 'restaurantOwnerStore'])->name('store');
                Route::get('/{user}/edit', [RestaurantController::class, 'restaurantOwnerEdit'])->name('edit');
                Route::post('/{user}', [RestaurantController::class, 'restaurantOwnerUpdate'])->name('update');
                Route::delete('/{user}', [RestaurantController::class, 'restaurantOwnerDestroy'])->name('destroy');
            });
            Route::prefix('restaurant-staff')->name('restaurantStaff.')->group(function () {
                Route::get('/', [RestaurantStaffController::class, 'index'])->name('index');
                Route::post('/fetch', [RestaurantStaffController::class, 'fetch'])->name('fetch');
                Route::get('/create', [RestaurantStaffController::class, 'create'])->name('create');
                Route::post('/', [RestaurantStaffController::class, 'store'])->name('store');
                Route::get('/{user}/edit', [RestaurantStaffController::class, 'edit'])->name('edit');
                Route::post('/{user}', [RestaurantStaffController::class, 'update'])->name('update');
                Route::delete('/{user}', [RestaurantStaffController::class, 'destroy'])->name('destroy');
                Route::get('/business-detail', [RestaurantStaffController::class, 'businessDetail'])->name('businessDetail');
                Route::post('/update/business-detail/{restaurant}', [RestaurantStaffController::class, 'updateRestaurantDetail'])->name('businessDetail.update');
                Route::get('/business-address', [RestaurantStaffController::class, 'businessDetailMap'])->name('businessDetailMap');
                Route::post('/update/business-address/{restaurant}', [RestaurantStaffController::class, 'updateRestaurantAddress'])->name('businessAddress.update');
            });
        });
    });
});

Route::get('/', [UserHomeController::class, 'index'])->name('front.home');
Route::get('businesses/{category_id?}', [BusinessController::class, 'index'])->name('business.list');
Route::get('business/{business}', [BusinessController::class, 'businessDetail'])->name('business.detail');
Route::get('cart', [CartController::class, 'viewCart'])->name('view.cart');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('user/login', [LoginController::class, 'login'])->name('user.login');
Route::middleware('auth:customer')->group(function () {
    Route::get('customer/logout', [LoginController::class, 'logout'])->name('user.logout');
    Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('profile', [FrontendProfileController::class, 'index'])->name('profile');
    Route::get('order-success', [CartController::class, 'orderSuccess'])->name('order.success');
});

Route::post('/store-location-session', function (Illuminate\Http\Request $request) {
    // Store the latitude, longitude, and address in the session
    Session::put('latitude', $request->latitude);
    Session::put('longitude', $request->longitude);
    Session::put('address', $request->address);
    // Session::put('city', $request->city);
    // Session::put('country', $request->country);
    return response()->json(['message' => 'Location stored in session']);
});
