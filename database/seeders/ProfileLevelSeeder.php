<?php

namespace Database\Seeders;

use App\Models\ProfileLevel;
use Illuminate\Database\Seeder;

class ProfileLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            ProfileLevel::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $profileLevel = [
            ["name"=>"Silver","description"=>"silver","slug"=>"silver"],
            ["name"=>"Gold","description"=>"gold","slug"=>"gold"],
            ["name"=>"Platinum","description"=>"platinum","slug"=>"platinum"],
        ];

        foreach ($profileLevel as $key => $value) {
            ProfileLevel::create($value);
        }
    }
}
