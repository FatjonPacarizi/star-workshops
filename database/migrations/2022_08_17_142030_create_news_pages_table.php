<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateNewsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('author')->unsigned();
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->text('description');
            $table->dateTime('time');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('news_pages');
    }
}
