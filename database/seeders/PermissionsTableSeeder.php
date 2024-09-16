<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Carbon;

class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        Permission::insert([
            [
                'id' => 1,
                'parent_id' => 0,
                'name' => 'dashboard',
                'description' => 'Dashboard',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'name' => 'general-setting',
                'description' => 'General Setting',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'name' => 'country-mater',
                'description' => 'Country',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'parent_id' => 2,
                'name' => 'currency-master',
                'description' => 'Currency',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'parent_id' => 0,
                'name' => 'personal-profile',
                'description' => 'Personal Profile',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'parent_id' => 0,
                'name' => 'professional-profile',
                'description' => 'Professional Profile',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'parent_id' => 0,
                'name' => 'user-list',
                'description' => 'User List',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],      
            [
                'id' => 8,
                'parent_id' => 0,
                'name' => 'restaurant',
                'description' => 'Restaurant',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            
            [
                'id' => 9,
                'parent_id' => 8,
                'name' => 'restaurant-owner',
                'description' => 'Owner',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
            [
                'id' => 10,
                'parent_id' => 8,
                'name' => 'sub-restaurant',
                'description' => 'Sub Restaurant',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],  
            [
                'id' => 11,
                'parent_id' => 8,
                'name' => 'restaurant-staff',
                'description' => 'Restaurant Staff',
                'guard_name' => 'web',
                'type' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],                      
        ]);
    }

    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
