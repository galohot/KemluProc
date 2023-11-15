<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpurchasingPenyediasTable extends Migration
{
    public function up()
    {
        Schema::create('epurchasing_penyedias', function (Blueprint $table) {
            $table->id();
            $table->integer('kd_penyedia');
            $table->string('nama_penyedia');
            $table->string('penyedia_ukm');
            $table->text('alamat_penyedia');
            $table->string('email_penyedia');
            $table->string('no_telp_penyedia');
            $table->string('npwp_penyedia');
            $table->string('kbli2020_penyedia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('epurchasing_penyedias');
    }
}