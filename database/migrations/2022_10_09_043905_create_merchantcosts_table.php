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
        Schema::create('merchantcosts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->float('pickup_amount', 10, 0)->unsigned()->nullable()->default(0);
            $table->float('delivery_amount', 10, 0)->unsigned()->nullable()->default(0);
            $table->float('discount_amount', 10, 0)->unsigned()->nullable()->default(0);            
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
        Schema::dropIfExists('merchantcosts');
    }
};
