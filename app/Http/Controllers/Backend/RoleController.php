<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\GeneralService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public $roleService;
    public $generalService;

    public function __construct(RoleService $roleService, GeneralService $generalService)
    {
        $this->roleService = $roleService;
        $this->generalService = $generalService;
    }

    public function index()
    {
        return view('backend.role.index');
    }

    public function fetch(Request $request)
    {
        $columns = [
            'roles.id', 
            'roles.name', 
            'roles.description', 
            'roles.created_by', 
            'roles.created_at',
            DB::raw("CONCAT(users.firstname, ' ', users.lastname) as createdBy")
        ];
        $response = $this->roleService->fetch($request->all(), $columns);

        $data = [];
        foreach ($response['data'] as $value) {
            $data[] = [
                'id' => $value->id,
                'name' => $value->name ?? '',
                'description' => $value->description ?? '',
                'created_date' => date('Y-m-d H:i:s', strtotime($value->created_at)),
                'created_by' => $value->createdBy ?? '',
                'actions' => '<div class="flex">' . editBtn(route('role.edit', $value->id)) . ' ' . deleteBtn(route('role.destroy', $value->id)) . '</div>',

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
        return view('backend.role.create');
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->store($request->all());
        return redirect()->route('role.index')->with('success', 'Saved successfully!');
    }

    public function edit(Role $role)
    {
        $exclude = config('enum.role_exclude_admin');
        if (in_array($role->name, $exclude)) {
            return redirect()->route('role.index')->with('error', 'You can\'t perform this action.');
        }
        $rolePermission = ! empty($role->permissions) ? $role->permissions->pluck('name')->toArray() : [];
        $permissions = $this->generalService->getPermissionList('0');
        return view('backend.role.edit', compact('role', 'permissions', 'rolePermission'));
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        $this->roleService->update($role, $request->all());
        return redirect()->route('role.index')->with('success', 'Saved successfully!');
    }

    public function destroy(Role $role)
    {
        $exclude = config('enum.role_exclude');
        if (in_array($role->name, $exclude)) {
            return redirect()->route('role.index')->with('error', 'You can\'t perform this action.');
        }
        $this->roleService->delete($role);
        return redirect()->route('role.index')->with('success', 'Deleted successfully!');
    }
}
