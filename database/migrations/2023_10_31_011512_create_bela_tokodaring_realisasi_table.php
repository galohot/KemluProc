<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelaTokodaringRealisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bela_tokodaring_realisasi', function (Blueprint $table) {
            $table->id();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('kd_satker')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('order_id')->nullable();
            $table->text('order_desc')->nullable();
            $table->decimal('valuasi', 15, 2)->nullable();
            $table->string('kategori')->nullable();
            $table->string('metode_bayar')->nullable();
            $table->dateTime('tanggal_transaksi')->nullable();
            $table->string('marketplace')->nullable();
            $table->string('nama_merchant')->nullable();
            $table->string('jenis_transaksi')->nullable();
            $table->string('kota_kab')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('nama_pemesan')->nullable();
            $table->string('status_verif')->nullable();
            $table->string('sumber_data')->nullable();
            $table->string('status_konfirmasi_ppmse')->nullable();
            $table->string('keterangan_ppmse')->nullable();
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
        Schema::dropIfExists('bela_tokodaring_realisasi');
    }
}
