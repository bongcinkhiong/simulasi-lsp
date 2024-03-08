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
        Schema::create('jadwal_penerbangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rute_id');
            $table->foreign('rute_id')->references('id')->on('rute')->onDelete('cascade');
            $table->time('waktu_berangkat');
            $table->time('waktu_tiba');
            $table->integer('harga');
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
        Schema::dropIfExists('jadwal_penerbangan');
    }
};
