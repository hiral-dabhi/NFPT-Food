<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantOwnerUpdateRequest;
use App\Http\Requests\RestaurantRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Models\RestaurantMaster;
use App\Models\User;
use App\Services\GeneralService;
use App\Services\RestaurantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RestaurantController extends Controller
{
    public $restaurantService;
    public $generalService;

    public function __construct(RestaurantService $restaurantService, GeneralService $generalService)
    {
        $this->restaurantService = $restaurantService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.subRestaurant.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'name', 'email', 'contact_number','address','city','state','country','zip_code','created_by'];
        $response = $this->restaurantService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'owner_name' => Crypt::decryptString($value->userDetail->name) ?? '',
                'name' => Crypt::decryptString($value->name) ?? '',
                'email' => $value->email ?? '',
                'contact_number' => $value->contact_number ?? '',
                'address' => $value->address ?? '',
                'city' => $value->city ?? '',
                'state' => $value->state ?? '',
                'country' => $value->hasCountry->name ?? '',
                'zip_code' => $value->zip_code ?? '',
                'description' => $value->zip_code ?? '',
                'created_date' => date('Y-m-d H:i:s', strtotime($value->created_at)),
                'created_by' => $value->createdBy ?? '',
                'actions' => '<div class="flex">' . editBtn(route('subRestaurant.edit', $value->id)) . ' ' . deleteBtn(route('subRestaurant.destroy', $value->id)) . '</div>',

            ];
        }
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $response['total'],
            'recordsFiltered' => $response['total'],
            'data' => $data,
        ]);
    }

    public function create()
    {
        $userList = $this->generalService->getUserList('restaurantUser');
        $countryList = $this->generalService->getCountryList();
        return view('backend.subRestaurant.create',compact('userList','countryList'));
    }

    public function store(RestaurantRequest $request)
    {
        $this->restaurantService->store($request->all());
        return redirect()->route('subRestaurant.index')->with('success', 'Saved successfully!');
    }

    public function edit(RestaurantMaster $restaurant)
    {
        $countryList = $this->generalService->getCountryList();
        $userList = $this->generalService->getUserList('restaurantUser');
        return view('backend.subRestaurant.edit', compact('restaurant','userList','countryList'));
    }

    public function update(RestaurantUpdateRequest $request, RestaurantMaster $restaurant)
    {
        $this->restaurantService->update($restaurant, $request->all());
        return redirect()->route('subRestaurant.index')->with('success', 'Saved successfully!');
    }

    public function destroy(RestaurantMaster $restaurant)
    {
        $this->restaurantService->delete($restaurant);
        return redirect()->route('subRestaurant.index')->with('success', 'Deleted successfully!');
    }


    public function restaurantOwnerIndex()
    {
        return view('backend.restaurantOwner.index');
    }

    public function restaurantOwnerFetch(Request $request)
    {
        $columns = ['id', 'name', 'email', 'contact_number','address','city','state','country','zip_code','created_by'];
        $response = $this->restaurantService->fetchOwner($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'name' => Crypt::decryptString($value->name) ?? '',
                'email' => $value->email ?? '',
                'contact_number' => $value->contact_number ?? '',
                'address' => $value->address ?? '',
                'city' => $value->city ?? '',
                'state' => $value->state ?? '',
                'country' => $value->hasCountry->name ?? '',
                'zip_code' => $value->zipcode ?? '',
                'actions' => '<div class="flex">' . editBtn(route('restaurantOwner.edit', $value->id)) . ' ' . deleteBtn(route('restaurantOwner.destroy', $value->id)) . '</div>',

            ];
        }
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $response['total'],
            'recordsFiltered' => $response['total'],
            'data' => $data,
        ]);
    }

    public function restaurantOwnerCreate()
    {
        $countryList = $this->generalService->getCountryList();
        return view('backend.restaurantOwner.create',compact('countryList'));
    }

    public function restaurantOwnerStore(RestaurantRequest $request)
    {
        $this->restaurantService->storeOwner($request->all());
        return redirect()->route('restaurantOwner.index')->with('success', 'Saved successfully!');
    }

    public function restaurantOwnerEdit(User $user)
    {
        $countryList = $this->generalService->getCountryList();
        return view('backend.restaurantOwner.edit', compact('user','countryList'));
    }

    public function restaurantOwnerUpdate(RestaurantOwnerUpdateRequest $request, User $user)
    {
        $this->restaurantService->updateOwner($user, $request->all());
        return redirect()->route('restaurantOwner.index')->with('success', 'Saved successfully!');
    }

    public function restaurantOwnerDestroy(User $user)
    {
        $this->restaurantService->deleteOwner($user);
        return redirect()->route('restaurantOwner.index')->with('success', 'Deleted successfully!');
    }
}
