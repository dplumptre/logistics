<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNarrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narrations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->mediumText('narration');
            $table->integer('location_id1');
            $table->integer('location_id2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('narrations');
    }
}
