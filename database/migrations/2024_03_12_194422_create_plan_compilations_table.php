<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanCompilationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_compilations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_plan');
            $table->foreign('id_plan')->references('id')->on('plans');
            $table->unsignedBigInteger('id_plan_type');
            $table->foreign('id_plan_type')->references('id')->on('plan_types');
            $table->float('value');
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
        Schema::dropIfExists('plan_compilations');
    }
}
