<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpsePesertaTenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_peserta_tender', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->integer('kd_tender')->nullable();
            $table->integer('kd_pkt_dce')->nullable();
            $table->integer('kd_peserta')->nullable();
            $table->bigInteger('kd_penyedia')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->decimal('nilai_penawaran', 15, 2)->nullable();
            $table->decimal('nilai_terkoreksi', 15, 2)->nullable();
            $table->integer('pemenang')->nullable();
            $table->integer('pemenang_terverifikasi')->nullable();
            $table->text('alasan')->nullable();
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
        Schema::dropIfExists('spse_peserta_tender');
    }
}
