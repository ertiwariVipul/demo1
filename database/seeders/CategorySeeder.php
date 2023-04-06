<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Category::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $modelCategory = [
            ["name"=>"Model","slug"=>"model","description"=>"Model"],
            ["name"=>"Exhibition girls","slug"=>"exhibition-girls","description"=>"Exhibition girls"],
            ["name"=>"Party girls","slug"=>"party-girls","description"=>"Party girls"],
            ["name"=>"Atmosphere girls","slug"=>"atmosphere-girls","description"=>"Atmosphere girls"],
            ["name"=>"Traditional models","slug"=>"traditional-model","description"=>"Traditional models"]
        ];

        foreach ($modelCategory as $key => $value) {
            Category::create($value);
        }
    }
}
