<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CurrencyController;
use App\Http\Controllers\Backend\DishController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\RestaurantController;
use App\Http\Controllers\Backend\RestaurantStaffController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SubAdminController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();
Route::middleware('auth')->group(function () {        
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::prefix('admin')->group(function () {
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

        Route::prefix('menu')->name('menu.')->group(function () {
            Route::post('/fetch-dish', [MenuController::class, 'getSubCategory'])->name('getSubCategory');
            Route::get('/', [MenuController::class, 'index'])->name('index');
            Route::post('/fetch', [MenuController::class, 'fetch'])->name('fetch');
            Route::get('/create', [MenuController::class, 'create'])->name('create');
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