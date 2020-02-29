<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('crop_name');
            $table->float('price');
            $table->float('amount');
            $table->string('location');
            $table->boolean('status'); //0 for pending, 1 for accepted
            $table->timestamps(); //timestamp include created_at
            $table->integer('merchant_id'); //same as user ID, only different role
            $table->integer('farmer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_request');
    }
}
