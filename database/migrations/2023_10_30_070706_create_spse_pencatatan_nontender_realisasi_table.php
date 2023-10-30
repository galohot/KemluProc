<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpsePencatatanNontenderRealisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_pencatatan_nontender_realisasi', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->integer('kd_nontender_pct')->nullable();
            $table->string('kategori_pengadaan')->nullable();
            $table->string('mtd_pemilihan')->nullable();
            $table->string('jenis_realisasi')->nullable();
            $table->string('no_realisasi')->nullable();
            $table->date('tgl_realisasi')->nullable();
            $table->decimal('nilai_realisasi', 15, 2)->nullable();
            $table->text('dok_realisasi')->nullable();
            $table->text('ket_realisasi')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('nama_ppk')->nullable();
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
        Schema::dropIfExists('spse_pencatatan_nontender_realisasi');
    }
}
