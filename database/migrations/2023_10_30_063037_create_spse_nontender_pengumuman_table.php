<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseNontenderPengumumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_nontender_pengumuman', function (Blueprint $table) {
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
            $table->text('nama_paket')->nullable();
            $table->decimal('pagu', 15, 2)->nullable();
            $table->decimal('hps', 15, 2)->nullable();
            $table->string('sumber_dana')->nullable();
            $table->text('mak')->nullable(); // Changed to text type
            $table->string('kualifikasi_paket')->nullable();
            $table->string('jenis_pengadaan')->nullable();
            $table->string('mtd_pemilihan')->nullable();
            $table->string('kontrak_pembayaran')->nullable();
            $table->string('status_nontender')->nullable();
            $table->integer('versi_nontender')->nullable();
            $table->string('ket_diulang')->nullable();
            $table->string('ket_ditutup')->nullable();
            $table->dateTime('tgl_buat_paket')->nullable();
            $table->dateTime('tgl_kolektif_kolegial')->nullable();
            $table->dateTime('tgl_pengumuman_nontender')->nullable();
            $table->string('dibuat_oleh')->nullable();
            $table->string('nip_pembuat_paket')->nullable();
            $table->string('nama_pembuat_paket')->nullable();
            $table->text('lokasi_pekerjaan')->nullable(); // Changed to text type
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
        Schema::dropIfExists('spse_nontender_pengumuman');
    }
}
