<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->unsignedInteger('kd_satker')->nullable();
            $table->string('kd_program')->nullable();
            $table->string('kd_kegiatan')->nullable();
            $table->string('kd_kegiatan_str')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->unsignedBigInteger('pagu_kegiatan')->nullable();
            $table->string('kd_kegiatan_lokal')->nullable();
            $table->boolean('is_deleted')->nullable();
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
        Schema::dropIfExists('kegiatan_master');
    }
};
