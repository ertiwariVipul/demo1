<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('db:seed --class RoleSeeder');
        Artisan::call('db:seed --class AdminSeeder');
        Artisan::call('db:seed --class CountrySeeder');
        Artisan::call('db:seed --class LanguageSeeder');
        Artisan::call('db:seed --class CategorySeeder');
        Artisan::call('db:seed --class ProfileLevelSeeder');
    }
}
