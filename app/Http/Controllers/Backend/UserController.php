<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantOwnerUpdateRequest;
use App\Http\Requests\RestaurantRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SubAdminUpdateRequest;
use App\Models\User;
use App\Services\GeneralService;
use App\Services\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('backend.user.index');
    }

    public function fetch(Request $request)
    {
        $columns = ['id', 'firstname','lastname', 'email', 'contact_number'];
        $response = $this->userService->fetch($request->all(),$columns);
        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'name' => Crypt::decryptString($value->firstname).' '.Crypt::decryptString($value->lastname) ?? '',
                'email' => $value->email ?? '',
                'contact_number' => $value->contact_number ?? '',
                'created_date' => date('Y-m-d H:i:s', strtotime($value->created_at)),                
                'created_by' => $value->createdBy ?? '',
                'actions' => '<div class="flex">' . editBtn(route('user.edit', $value->id)) . ' ' . deleteBtn(route('user.destroy', $value->id)) . '</div>',
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
        return view('backend.user.create');
    }

    public function store(UserRequest $request)
    {
        $this->userService->store($request->all());
        return redirect()->route('user.index')->with('success', 'Saved successfully!');
    }

    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    public function update(SubAdminUpdateRequest $request, User $user)
    {
        $this->userService->update($user, $request->all());
        return redirect()->route('user.index')->with('success', 'Saved successfully!');
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return redirect()->route('user.index')->with('success', 'Deleted successfully!');
    }
}

