<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseJadwalTahapanNontenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_jadwal_tahapan_nontender', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->integer('kd_nontender')->nullable();
            $table->integer('kd_tahapan')->nullable();
            $table->string('nama_tahapan')->nullable();
            $table->integer('kd_akt')->nullable();
            $table->string('nama_akt')->nullable();
            $table->dateTime('tgl_awal')->nullable();
            $table->dateTime('tgl_akhir')->nullable();
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
        Schema::dropIfExists('spse_jadwal_tahapan_nontender');
    }
}
