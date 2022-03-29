<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('number_of_bags');
            $table->text('description');
            $table->string('extra_number');
            $table->string('number_of_bags');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('postcode_id')->nullable();
            $table->unsignedBigInteger('blood_id')->nullable();
            $table->foreign('blood_id')->references('id')->on('blood_groups');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('postcode_id')->references('id')->on('post_codes')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('blood_requests');
    }
}
