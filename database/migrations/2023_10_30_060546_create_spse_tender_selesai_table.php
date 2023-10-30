<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseTenderSelesaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_tender_selesai', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->string('nama_lpse')->nullable();
            $table->integer('kd_tender')->nullable();
            $table->integer('kd_pkt_dce')->nullable();
            $table->string('kd_rup')->nullable();
            $table->text('nama_paket')->nullable();
            $table->decimal('pagu', 15, 2)->nullable();
            $table->decimal('hps', 15, 2)->nullable();
            $table->string('sumber_dana')->nullable();
            $table->text('mak')->nullable();
            $table->string('kualifikasi_paket')->nullable();
            $table->string('jenis_pengadaan')->nullable();
            $table->string('mtd_pemilihan')->nullable();
            $table->string('mtd_evaluasi')->nullable();
            $table->string('mtd_kualifikasi')->nullable();
            $table->string('kontrak_pembayaran')->nullable();
            $table->string('status_tender')->nullable();
            $table->dateTime('tgl_pengumuman_tender')->nullable();
            $table->dateTime('tgl_penetapan_pemenang')->nullable();
            $table->string('url_lpse')->nullable();
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
        Schema::dropIfExists('spse_tender_selesai');
    }
}
