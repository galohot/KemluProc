<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRupKroMasterTable extends Migration
{
    public function up()
    {
        Schema::create('rup_kro_master', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_program')->nullable();
            $table->string('kd_kegiatan')->nullable();
            $table->string('kd_kro')->nullable();
            $table->string('kd_kro_str')->nullable();
            $table->string('nama_kro')->nullable();
            $table->bigInteger('pagu_kro')->nullable();
            $table->string('kd_kro_lokal')->nullable();
            $table->boolean('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rup_kro_master');
    }
};
