<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseNontenderSelesaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_nontender_selesai', function (Blueprint $table) {
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
            $table->integer('kd_nontender')->nullable();
            $table->integer('kd_pkt_dce')->nullable();
            $table->string('kd_rup')->nullable();
            $table->text('nama_paket')->nullable(); // Changed to text type
            $table->decimal('pagu', 15, 2)->nullable();
            $table->decimal('hps', 15, 2)->nullable();
            $table->decimal('nilai_penawaran', 15, 2)->nullable();
            $table->decimal('nilai_terkoreksi', 15, 2)->nullable();
            $table->decimal('nilai_negosiasi', 15, 2)->nullable();
            $table->decimal('nilai_kontrak', 15, 2)->nullable();
            $table->decimal('nilai_pdn_kontrak', 15, 2)->nullable();
            $table->decimal('nilai_umk_kontrak', 15, 2)->nullable();
            $table->string('sumber_dana')->nullable();
            $table->text('mak')->nullable();
            $table->string('kualifikasi_paket')->nullable();
            $table->string('jenis_pengadaan')->nullable();
            $table->string('mtd_pemilihan')->nullable();
            $table->string('kontrak_pembayaran')->nullable();
            $table->string('status_nontender')->nullable();
            $table->dateTime('tgl_pengumuman_nontender')->nullable();
            $table->dateTime('tgl_selesai_nontender')->nullable();
            $table->string('dibuat_oleh')->nullable();
            $table->string('nip_pembuat_paket')->nullable();
            $table->string('nama_pembuat_paket')->nullable();
            $table->integer('kd_penyedia')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
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
        Schema::dropIfExists('spse_nontender_selesai');
    }
}
