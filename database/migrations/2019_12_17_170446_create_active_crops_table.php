<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_crops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('crop_name');
            $table->bigInteger('duration');
            $table->float('quantity');
            $table->dateTime('end_time');
            $table->timestamps();
            $table->boolean('status');
            $table->integer('farmer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_crops');
    }
}
