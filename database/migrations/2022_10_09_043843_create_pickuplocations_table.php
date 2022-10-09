<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickuplocations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->nullable();
            $table->text('address', 65535)->nullable();
            $table->bigInteger('phone');
            $table->string('email', 191)->nullable();
            $table->unsignedBigInteger('district_id')->nullable(false)->index();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('zone_id')->nullable(false)->index();
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->unsignedBigInteger('area_id')->nullable(false)->index();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedBigInteger('user_id')->nullable(false)->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', array('0','1'))->default(1);
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
        Schema::dropIfExists('pickuplocations');
    }
};
