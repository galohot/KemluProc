<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpurchasingKomoditasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epurchasing_komoditas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kd_komoditas')->nullable();
            $table->string('nama_komoditas')->nullable();
            $table->string('jenis_katalog')->nullable();
            $table->string('nama_instansi_katalog')->nullable();
            $table->string('kd_instansi_katalog')->nullable();
            // Add other columns as needed

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
        Schema::dropIfExists('epurchasing_komoditas');
    }
}