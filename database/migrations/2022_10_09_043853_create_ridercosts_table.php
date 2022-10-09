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
        Schema::create('ridercosts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->float('pickup_amount', 10, 0)->unsigned()->nullable()->default(0);
            $table->float('delivery_amount', 10, 0)->unsigned()->nullable()->default(0);
            $table->float('sallery_amount', 10, 0)->unsigned()->nullable()->default(0);
            $table->enum('ridertype', array('freelance','job'))->default('freelance');
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
        Schema::dropIfExists('ridercosts');
    }
};
