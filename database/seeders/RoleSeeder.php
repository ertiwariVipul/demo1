<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Role::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
         
        $roles = [
            ["name"=>"admin","guard_name"=>"web"],
            ["name"=>"user","guard_name"=>"web"],
            ["name"=>"model","guard_name"=>"web"],
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
