<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('solar_id')->unsigned();
            $table->foreign('solar_id')->references('id')->on('solars')->onDelete('cascade');
            $table->string('name',100);
            $table->decimal('size');
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
        Schema::drop('suns');
    }
}
