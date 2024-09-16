<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsSuperAdmin = Permission::where('type', '0')->pluck('id')->toArray() ?? [];
        $superAdmin = Role::where('name', 'SuperAdmin')->first();
        $superAdmin->syncPermissions($permissionsSuperAdmin);
    }
}
