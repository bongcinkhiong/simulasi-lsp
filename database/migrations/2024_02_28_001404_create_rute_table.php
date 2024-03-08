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
        Schema::create('rute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maskapai_id');
            $table->foreign('maskapai_id')->references('id')->on('maskapai')->onDelete('cascade');
            $table->string('rute_asal');
            $table->string('rute_tujuan');
            $table->date('tanggal_pergi');
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
        Schema::dropIfExists('rute');
    }
};
