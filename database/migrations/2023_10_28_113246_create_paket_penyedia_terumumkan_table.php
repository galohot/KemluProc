<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketPenyediaTerumumkanTable extends Migration
{
    public function up()
    {
        Schema::create('paket_penyedia_terumumkan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('kd_rup')->nullable();
            $table->text('nama_paket')->nullable();
            $table->bigInteger('pagu')->nullable();
            $table->string('kd_metode_pengadaan')->nullable();
            $table->string('metode_pengadaan')->nullable();
            $table->string('kd_jenis_pengadaan')->nullable();
            $table->string('jenis_pengadaan')->nullable();
            $table->string('status_pradipa')->nullable();
            $table->string('status_pdn')->nullable();
            $table->string('status_ukm')->nullable();
            $table->string('alasan_non_ukm')->nullable();
            $table->string('status_konsolidasi')->nullable();
            $table->string('tipe_paket')->nullable();
            $table->string('kd_rup_swakelola')->nullable();
            $table->string('kd_rup_lokal')->nullable();
            $table->string('volume_pekerjaan')->nullable();
            $table->text('urarian_pekerjaan')->nullable();
            $table->text('spesifikasi_pekerjaan')->nullable();
            $table->date('tgl_awal_pemilihan')->nullable();
            $table->date('tgl_akhir_pemilihan')->nullable();
            $table->date('tgl_awal_kontrak')->nullable();
            $table->date('tgl_akhir_kontrak')->nullable();
            $table->date('tgl_awal_pemanfaatan')->nullable();
            $table->date('tgl_akhir_pemanfaatan')->nullable();
            $table->dateTime('tgl_buat_paket')->nullable();
            $table->string('tgl_pengumuman_paket')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('nama_ppk')->nullable();
            $table->string('username_ppk')->nullable();
            $table->string('status_aktif_rup')->nullable();
            $table->string('status_delete_rup')->nullable();
            $table->string('status_umumkan_rup')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket_penyedia_terumumkan');
    }
};
