<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_location', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('quantity_good')->nullable();
            $table->string('quantity_bad')->nullable();
            $table->string('quantity_damaged')->nullable();
            $table->integer('equipment_id')->unsigned()->index();
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
            $table->integer('location_id')->unsigned()->index();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_location');
    }
}
