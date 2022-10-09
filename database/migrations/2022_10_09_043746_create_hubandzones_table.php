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
        Schema::create('hubandzones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zone_id')->nullable(false);
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->unsignedBigInteger('hub_id')->nullable(false);
            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade');
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
        Schema::dropIfExists('hubandzones');
    }
};
