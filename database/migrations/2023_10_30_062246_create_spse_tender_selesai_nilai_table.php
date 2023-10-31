<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseTenderSelesaiNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_tender_selesai_nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('nama_satker')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->integer('kd_tender')->nullable();
            $table->integer('kd_paket')->nullable();
            $table->string('kd_rup_paket')->nullable();
            $table->decimal('pagu', 15, 2)->nullable();
            $table->decimal('hps', 15, 2)->nullable();
            $table->decimal('nilai_penawaran', 15, 2)->nullable();
            $table->decimal('nilai_terkoreksi', 15, 2)->nullable();
            $table->decimal('nilai_negosiasi', 15, 2)->nullable();
            $table->decimal('nilai_kontrak', 15, 2)->nullable();
            $table->date('tgl_pengumuman_tender')->nullable();
            $table->date('tgl_penetapan_pemenang')->nullable();
            $table->integer('kd_penyedia')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->decimal('nilai_pdn_kontrak', 15, 2)->nullable();
            $table->decimal('nilai_umk_kontrak', 15, 2)->nullable();
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
        Schema::dropIfExists('spse_tender_selesai_nilai');
    }
}
