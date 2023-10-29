<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketSwakelolaTerumumkanTable extends Migration
{
    public function up()
    {
        Schema::create('paket_swakelola_terumumkan', function (Blueprint $table) {
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
            $table->string('tipe_swakelola')->nullable();
            $table->string('volume_pekerjaan')->nullable();
            $table->text('uraian_pekerjaan')->nullable();
            $table->string('kd_klpd_penyelenggara')->nullable();
            $table->string('nama_klpd_penyelenggara')->nullable();
            $table->string('nama_satker_penyelenggara')->nullable();
            $table->date('tgl_awal_pelaksanaan_kontrak')->nullable();
            $table->date('tgl_akhir_pelaksanaan_kontrak')->nullable();
            $table->dateTime('tgl_buat_paket')->nullable();
            $table->string('tgl_pengumuman_paket')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('nama_ppk')->nullable();
            $table->string('username_ppk')->nullable();
            $table->string('kd_rup_lokal')->nullable();
            $table->string('status_aktif_rup')->nullable();
            $table->string('status_delete_rup')->nullable();
            $table->string('status_umumkan_rup')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket_swakelola_terumumkan');
    }
};
