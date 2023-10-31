<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpsePencatatanNontenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_pencatatan_nontender', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->integer('kd_nontender_pct')->nullable();
            $table->integer('kd_pkt_dce')->nullable();
            $table->string('kd_rup')->nullable();
            $table->text('nama_paket')->nullable();
            $table->decimal('pagu', 15, 2)->nullable();
            $table->decimal('total_realisasi', 15, 2)->nullable();
            $table->integer('nilai_pdn_pct')->nullable();
            $table->integer('nilai_umk_pct')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->text('uraian_pekerjaan')->nullable();
            $table->text('informasi_lainnya')->nullable();
            $table->string('kategori_pengadaan')->nullable();
            $table->string('mtd_pemilihan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status_nontender_pct')->nullable();
            $table->string('status_nontender_pct_ket')->nullable();
            $table->text('alasan_pembatalan')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('nama_ppk')->nullable();
            $table->dateTime('tgl_buat_paket')->nullable();
            $table->dateTime('tgl_mulai_paket')->nullable();
            $table->dateTime('tgl_selesai_paket')->nullable();
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
        Schema::dropIfExists('spse_pencatatan_nontender');
    }
}
