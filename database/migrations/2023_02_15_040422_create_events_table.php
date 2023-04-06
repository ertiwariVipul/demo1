<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('typeOfEvent')->nullable();
            $table->date('date')->nullable();
            $table->string('startTime')->nullable();
            $table->string('endTime')->nullable();
            $table->string('location')->nullable();
            $table->longText('description')->nullable();
            $table->string('noOfGirls')->nullable();
            $table->string('ageRange')->nullable();
            $table->boolean('status')->default(0)->comment('0.pending / 1.completed');
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
        Schema::dropIfExists('events');
    }
}
