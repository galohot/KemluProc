<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketSwakelolaLokasiTable extends Migration
{
    public function up()
    {
        Schema::create('paket_swakelola_lokasi', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('kd_rup')->nullable();
            $table->string('detail_lokasi')->nullable();
            $table->string('kd_kab_kota')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('kd_provinsi')->nullable();
            $table->string('provinsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket_swakelola_lokasi');
    }
};
