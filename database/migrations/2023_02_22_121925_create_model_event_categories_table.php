<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelEventCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_event_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('eventId');
            $table->foreign('eventId')->references('id')->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('categoryId')->nullable();
            $table->foreign('categoryId')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('model_event_categories');
    }
}
