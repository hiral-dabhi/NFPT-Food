<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function fetch($roleData, $columns)
    {
        $query = Role::whereNotIn('roles.name', config('enum.role_exclude_admin'))->select($columns)
            ->leftjoin('users', 'roles.created_by', '=', 'users.id');

        if (! empty($roleData['search']['value'])) {
            $searchValue = $roleData['search']['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('roles.name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('roles.id', 'LIKE', '%' . $searchValue . '%')
                    ->orWhereDate('roles.created_at', 'LIKE', '%' . $searchValue . '%')
                    ->orWhereDate('users.name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('roles.description', 'LIKE', '%' . $searchValue . '%');
            });
        }
        $total = $query->count();

        $orderByColumn = $columns[$roleData['order'][0]['column']];
        $orderDirection = $roleData['order'][0]['dir'];
        $query->orderBy($orderByColumn, $orderDirection);

        $start = $roleData['start'];
        $length = $roleData['length'];
        $query->skip($start)->take($length);

        $filteredCount = $query->count();
        $data = $query->get();

        return [
            'data' => $data,
            'total' => $total,
            'filteredCount' => $filteredCount,
        ];
    }
    public function store($roleData)
    {
        $roleData = [
            'name' => str_replace(' ', '', $roleData['name']),
            'description' => $roleData['description'],
            'created_by' => Auth::user()->id,
        ];

        $role = Role::create($roleData);
       /*  if ($role) {
            activity('Role')
                ->causedBy(auth()->user()->id)
                ->withProperties(json_encode($role))
                ->event('created')
                ->tap(function (Activity $activity) use ($role) {
                    $activity->remote_ip = request()->ip();
                    $activity->log_name = 'Role';
                    $activity->performed_on = $role->name;
                    $activity->subject_type = $role::class;
                    $activity->subject_id = auth()->user()->id;
                })
                ->log('Role Created successfully');
        } */
    }
    public function update(Role $role, $roleData)
    {
        $permissions = $roleData['permission'] ?? '';

        $roleData = [
            'name' => str_replace(' ', '', trim($roleData['name'])),
            'description' => $roleData['description'],
        ];

        $roleUpdate = $role->update($roleData);
        // if ($roleUpdate) {
        //     activity('Role')
        //         ->causedBy(auth()->user()->id)
        //         ->withProperties(json_encode($role))
        //         ->event('updated')
        //         ->tap(function (Activity $activity) use ($role) {
        //             $activity->remote_ip = request()->ip();
        //             $activity->log_name = 'Role';
        //             $activity->performed_on = $role->name;
        //             $activity->subject_type = $role::class;
        //             $activity->subject_id = auth()->user()->id;
        //         })
        //         ->log('Role Updated successfully');
        // }
        if ($roleUpdate) {
            $role->syncPermissions($permissions);
        }
        return $role;
    }
    public function delete(Role $role)
    {
        if ($role->delete()) {
            $role->permissions()->detach();
        }
        return $role;
    }
}
