<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Http\Requests\RestaurantStaffRequest;
use App\Http\Requests\RestaurantStaffUpdateRequest;
use App\Http\Requests\RestaurantUpdateRequest;
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
            $data[] = [
                'id' => $value->id,
                'restaurant_name' => Crypt::decryptString($value->restaurantDetail->name) ?? '',
                'name' => Crypt::decryptString($value->firstname).' '.Crypt::decryptString($value->lastname) ?? '',
                'email' => $value->email ?? '',
                'contact_number' => $value->contact_number ?? '',
                'created_date' => date('Y-m-d H:i:s', strtotime($value->created_at)),
                'created_by' => $value->createdBy ?? '',
                'actions' => '<div class="flex">' . editBtn(route('restaurantStaff.edit', $value->id)) . ' ' . deleteBtn(route('restaurantStaff.destroy', $value->id)) . '</div>',

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
}

