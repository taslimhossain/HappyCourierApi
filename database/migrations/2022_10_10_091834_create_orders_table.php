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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unique()->nullable(false);
            $table->unsignedBigInteger('pickup_id')->nullable(false);
            $table->foreign('pickup_id')->references('id')->on('pickuplocations');
            $table->text('pickup_note', 65535)->nullable();
            $table->bigInteger('customer_name')->nullable(false);
            $table->bigInteger('customer_mobile')->nullable(false);
            $table->text('delivery_note', 65535)->nullable();
            $table->unsignedBigInteger('district_id')->nullable(false);
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('zone_id')->nullable(false);
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->unsignedBigInteger('area_id')->nullable(false);
            $table->foreign('area_id')->references('id')->on('areas');
            $table->text('deliveryaddress', 65535)->nullable();
            $table->unsignedBigInteger('cod')->nullable()->default(0);
            $table->unsignedBigInteger('producttype_id')->nullable(false);
            $table->foreign('producttype_id')->references('id')->on('producttypes');
            $table->unsignedBigInteger('weight_id')->nullable(false);
            $table->foreign('weight_id')->references('id')->on('weights');
            $table->unsignedBigInteger('service_id')->nullable(false);
            $table->foreign('service_id')->references('id')->on('servicetypes');
            $table->unsignedBigInteger('user_id')->nullable(false)->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('order_status_id')->nullable(false);
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
        Schema::dropIfExists('orders');
    }
};
