<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantOwnerUpdateRequest;
use App\Http\Requests\RestaurantRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Http\Requests\SubAdminRequest;
use App\Http\Requests\SubAdminUpdateRequest;
use App\Models\User;
use App\Services\GeneralService;
use App\Services\subAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SubAdminController extends Controller
{
    public $subAdminService;
    public $generalService;

    public function __construct(SubAdminService $subAdminService, GeneralService $generalService)
    {
        $this->subAdminService = $subAdminService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.subAdmin.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'name', 'email', 'contact_number'];
        $response = $this->subAdminService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'name' => Crypt::decryptString($value->name) ?? '',
                'email' => $value->email ?? '',
                'contact_number' => $value->contact_number ?? '',
                'country'=>$value->hasCountry->name ?? '',
                'created_date' => date('Y-m-d H:i:s', strtotime($value->created_at)),                'created_by' => $value->createdBy ?? '',
                'actions' => '<div class="flex">' . editBtn(route('subAdmin.edit', $value->id)) . ' ' . deleteBtn(route('subAdmin.destroy', $value->id)) . '</div>',
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
        $countryList = $this->generalService->getCountryList();

        return view('backend.subAdmin.create',compact('countryList'));
    }

    public function store(SubAdminRequest $request)
    {
        $this->subAdminService->store($request->all());
        return redirect()->route('subAdmin.index')->with('success', 'Saved successfully!');
    }

    public function edit(User $user)
    {
        $countryList = $this->generalService->getCountryList();
        return view('backend.subAdmin.edit', compact('user','countryList'));
    }

    public function update(SubAdminUpdateRequest $request, User $user)
    {
        $this->subAdminService->update($user, $request->all());
        return redirect()->route('subAdmin.index')->with('success', 'Saved successfully!');
    }

    public function destroy(User $user)
    {
        $this->subAdminService->delete($user);
        return redirect()->route('subAdmin.index')->with('success', 'Deleted successfully!');
    }
}

