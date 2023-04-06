<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Hash;

class AdminSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->fullName = "Rixeragency Admin";
        $user->email = "admin@admin.com";
        $user->countryCode = "+91";
        $user->phone = "0000000000";
        $user->password = Hash::make("Admin@123");
        $user->city = "surat";
        $user->country = 103; //India
        $user->save();
        $user->assignRole(Role::where('name','admin')->first());
    }
}
