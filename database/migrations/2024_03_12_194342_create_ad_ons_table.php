<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdOnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_ons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('value');
            $table->string('description');
            $table->unsignedBigInteger('id_plan');
            $table->foreign('id_plan')->references('id')->on('plans');
            $table->unsignedBigInteger('id_plan_type');
            $table->foreign('id_plan_type')->references('id')->on('plan_types');
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
        Schema::dropIfExists('ad_ons');
    }
}
