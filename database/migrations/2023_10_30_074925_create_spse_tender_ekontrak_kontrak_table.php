<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseTenderEkontrakKontrakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_tender_ekontrak_kontrak', function (Blueprint $table) {
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
            $table->longText('lingkup_pekerjaan')->nullable();
            $table->string('no_sppbj')->nullable();
            $table->string('no_kontrak')->nullable();
            $table->date('tgl_kontrak')->nullable();
            $table->date('tgl_kontrak_awal')->nullable();
            $table->date('tgl_kontrak_akhir')->nullable();
            $table->string('kota_kontrak')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('nama_ppk')->nullable();
            $table->string('jabatan_ppk')->nullable();
            $table->string('no_sk_ppk')->nullable();
            $table->integer('kd_penyedia')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->string('bentuk_usaha_penyedia')->nullable();
            $table->string('tipe_penyedia')->nullable();
            $table->string('anggota_kso')->nullable();
            $table->string('wakil_sah_penyedia')->nullable();
            $table->string('jabatan_wakil_penyedia')->nullable();
            $table->string('nama_rek_bank')->nullable();
            $table->string('no_rek_bank')->nullable();
            $table->string('nama_pemilik_rek_bank')->nullable();
            $table->decimal('nilai_kontrak', 15, 2)->nullable();
            $table->text('alasan_ubah_nilai_kontrak')->nullable();
            $table->text('alasan_nilai_kontrak_10_persen')->nullable();
            $table->decimal('nilai_pdn_kontrak', 15, 2)->nullable();
            $table->decimal('nilai_umk_kontrak', 15, 2)->nullable();
            $table->string('jenis_kontrak')->nullable();
            $table->text('informasi_lainnya')->nullable();
            $table->string('status_kontrak')->nullable();
            $table->date('tgl_penetapan_status_kontrak')->nullable();
            $table->text('alasan_penetapan_status_kontrak')->nullable();
            $table->string('apakah_addendum')->nullable();
            $table->integer('versi_addendum')->nullable();
            $table->text('alasan_addendum')->nullable();
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
        Schema::dropIfExists('spse_tender_ekontrak_kontrak');
    }
}
