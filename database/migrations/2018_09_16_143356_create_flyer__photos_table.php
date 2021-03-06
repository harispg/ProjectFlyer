<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlyerPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyer__photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flyer_id')->unsigned();

            $table->foreign('flyer_id')->references('id')->on('flyers')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('path', 170);
            $table->string('thumbnail_path', 170);            
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
        Schema::dropIfExists('flyer__photos');
    }
}
