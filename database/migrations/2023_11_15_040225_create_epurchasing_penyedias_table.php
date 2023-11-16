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
            $table->integer('kd_penyedia')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('penyedia_ukm')->nullable();
            $table->text('alamat_penyedia')->nullable();
            $table->string('email_penyedia')->nullable();
            $table->string('no_telp_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->text('kbli2020_penyedia')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('epurchasing_penyedias');
    }
}