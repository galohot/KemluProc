<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseTenderEkontrakSpmksppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_tender_ekontrak_spmkspp', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->text('alamat_satker')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->integer('kd_tender')->nullable();
            $table->text('nama_paket')->nullable();
            $table->string('no_sppbj')->nullable();
            $table->string('no_kontrak')->nullable();
            $table->string('no_spmk_spp')->nullable();
            $table->dateTime('tgl_spmk_spp')->nullable();
            $table->dateTime('tgl_mulai_pekerjaan')->nullable();
            $table->dateTime('tgl_selesai_pekerjaan')->nullable();
            $table->string('waktu_penyelesaian')->nullable();
            $table->string('kota_spmk_spp')->nullable();
            $table->text('alamat_pengiriman')->nullable();
            $table->string('nama_ppk')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('jabatan_ppk')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->text('alamat_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->string('wakil_sah_penyedia')->nullable();
            $table->string('jabatan_wakil_penyedia')->nullable();
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
        Schema::dropIfExists('spse_tender_ekontrak_spmkspp');
    }
}
