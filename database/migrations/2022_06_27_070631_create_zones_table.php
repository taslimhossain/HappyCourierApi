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
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->unsignedBigInteger('district_id')->nullable(false)->index();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->enum('is_insidecity', array('0','1'))->default(0);
            $table->enum('pickup_accept', array('0','1'))->default(1);
            $table->enum('delivery_accept', array('0','1'))->default(1);
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
        Schema::dropIfExists('zones');
    }
};
