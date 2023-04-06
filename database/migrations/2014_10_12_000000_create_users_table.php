<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('modelNo')->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('fullName');
            $table->string('email')->unique();
            $table->string('countryCode')->nullable();
            $table->string('phone', 15)->unique()->nullable();
            $table->string('password');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('profile')->nullable();
            $table->boolean('status')->default(1)->comment('0.Inactive / 1.Active');
            $table->timestamp('emailVerifiedAt')->nullable();
            $table->longText('deviceToken')->nullable();
            $table->boolean('deviceType')->default(0)->comment('0.android / 1.iOS');
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
