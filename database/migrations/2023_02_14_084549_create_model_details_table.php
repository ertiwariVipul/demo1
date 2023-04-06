<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('userId');
            $table->foreign('userId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('profileLevelId')->nullable();
            $table->foreign('profileLevelId')->references('id')->on('profile_levels')->onUpdate('cascade')->onDelete('cascade');
            $table->string('height')->nullable();
            $table->string('waist')->nullable();
            $table->string('weight')->nullable();
            $table->string('hips')->nullable();
            $table->string('hair')->nullable();
            $table->string('bust')->nullable();
            $table->string('eyecolor')->nullable();            
            $table->boolean('isAccepted')->default(0)->comment('0.Pending / 1.Complete / 2.Rejected');
            $table->boolean('status')->default(1)->comment('0.Inactive / 1.Active');
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
        Schema::dropIfExists('model_details');
    }
}
