<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Http\Requests\RestaurantStaffRequest;
use App\Http\Requests\RestaurantStaffUpdateRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Models\RestaurantMaster;
use App\Models\User;
use App\Services\GeneralService;
use App\Services\RestaurantStaffService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RestaurantStaffController extends Controller
{
    public $restaurantStaffService;
    public $generalService;

    public function __construct(RestaurantStaffService $restaurantStaffService, GeneralService $generalService)
    {
        $this->restaurantStaffService = $restaurantStaffService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.restaurantStaff.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'firstname','lastname', 'email', 'contact_number','created_by','created_at'];
        $response = $this->restaurantStaffService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $firstName = !empty($value->firstname) ?  Crypt::decryptString($value->firstname) : '';
            $lastName = !empty($value->lastname) ?  Crypt::decryptString($value->lastname) : '';
            if(!empty($value->staffRestaurant->restaurantDetail)){
                $data[] = [
                    'id' => $value->id,
                    'restaurant_name' => Crypt::decryptString($value->staffRestaurant->restaurantDetail->name) ?? '',
                    'name' => $firstName.' '.$lastName,
                    'email' => $value->email ?? '',
                    'contact_number' => $value->contact_number ?? '',
                    'created_date' => date('Y-m-d H:i:s', strtotime($value->created_at)),
                    'created_by' => $value->createdBy ?? '',
                    'actions' => '<div class="flex">' . editBtn(route('restaurantStaff.edit', $value->id)) . ' ' . deleteBtn(route('restaurantStaff.destroy', $value->id)) . '</div>',
    
                ];
            }
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
        $restaurantList = $this->generalService->getRestaurantList();
        return view('backend.restaurantStaff.create',compact('restaurantList'));
    }

    public function store(RestaurantStaffRequest $request)
    {
        $this->restaurantStaffService->store($request->all());
        return redirect()->route('restaurantStaff.index')->with('success', 'Saved successfully!');
    }

    public function edit(User $user)
    {
        $restaurantList = $this->generalService->getRestaurantList();
        return view('backend.restaurantStaff.edit', compact('user','restaurantList'));
    }

    public function update(RestaurantStaffUpdateRequest $request, User $user)
    {
        $this->restaurantStaffService->update($user, $request->all());
        return redirect()->route('restaurantStaff.index')->with('success', 'Saved successfully!');
    }

    public function destroy(User $user)
    {
        $this->restaurantStaffService->delete($user);
        return redirect()->route('restaurantStaff.index')->with('success', 'Deleted successfully!');
    }
    public function businessDetail(){
        $user = User::where('id',auth()->user()->id)->first();
        $restaurant = $user->hasRole('BusinessOwner') ? $user->restaurantDetail :  $user->staffRestaurant->restaurantDetail ?? null;
        return view('backend.restaurantStaff.business-detail', compact('restaurant'));
    }
    public function updateRestaurantDetail(Request $request,RestaurantMaster $restaurant)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'open_at' => 'required',
            'close_at' => 'required',
            'is_closed' => 'required|boolean',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);
        $restaurant->name = Crypt::encryptString($request->name);
        $restaurant->description = $request->description;
        $restaurant->open_at = $request->open_at;
        $restaurant->close_at = $request->close_at;
        $restaurant->is_closed = $request->is_closed;
        $restaurant->address = $request->address;
        $restaurant->city = $request->city;
        $restaurant->state = $request->state;
        $restaurant->zip_code = $request->zip_code;
        $restaurant->save();

        return redirect()->back()->with('success', 'Business details updated successfully.');
    }

    public function businessDetailMap(){
        $user = User::where('id',auth()->user()->id)->first();
        $restaurant = $user->hasRole('BusinessOwner') ? $user->restaurantDetail :  $user->staffRestaurant->restaurantDetail ?? null;
        $countryList = $this->generalService->getCountryList();

        return view('backend.restaurantStaff.business-map', compact('restaurant','countryList'));
    }
    
    public function updateRestaurantAddress(Request $request,RestaurantMaster $restaurant)
    {
       
        $request->validate([
            'address' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'zip_code' => 'required',
            // 'country' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $restaurant->address = $request->address;
        $restaurant->city = $request->city;
        $restaurant->state = $request->state;
        $restaurant->zip_code = $request->zip_code;
        $restaurant->country = $request->country;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->save();

        return redirect()->back()->with('success', 'Business details updated successfully.');
    }
}

