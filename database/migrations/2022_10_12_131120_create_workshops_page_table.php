<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops_page', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('paragraf_1')->nullable();
            $table->text('paragraf_2')->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('workshops_page');
    }
}
