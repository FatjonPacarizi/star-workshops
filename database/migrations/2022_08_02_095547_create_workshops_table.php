<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('author')->unsigned();
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->Integer('limited_participants')->nullable();
            $table->text('description');
            $table->dateTime('workshop_startTime')->nullable();
            $table->dateTime('workshop_endTime')->nullable();
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');         
            $table->dateTime('time');
            $table->string('img_workshop')->nullable();
            $table->string('filedlink');
            $table->bigInteger('deleted_from_id')->unsigned()->nullable();
            $table->foreign('deleted_from_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('workshops');
    }
}
