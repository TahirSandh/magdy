<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Tony david', 
            'f_name' => 'Tony', 
            'l_name' => 'david', 
            'phone' => '03138506039',
            'occupation' => 'administrator',
            'dob' => Null,
            'gender' => 'male',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_verified' => 1,
            'email_verified' => 1,
            'email_verified_at' => date('Y-m-d'),
            'status' => 1,
        ]);
        $role = Role::create(['name' => 'Admin']);
        $role1 = Role::create(['name' => 'Travelar']);
        $role2 = Role::create(['name' => 'Shopper']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
