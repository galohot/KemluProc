<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketAnggaranPenyediaTable extends Migration
{
    public function up()
    {
        Schema::create('paket_anggaran_penyedia', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('kd_rup')->nullable();
            $table->string('kd_rup_lokal')->nullable();
            $table->string('kd_kegiatan')->nullable();
            $table->string('kd_komponen')->nullable();
            $table->string('kd_subkegiatan')->nullable();
            $table->decimal('pagu', 15, 2)->nullable();
            $table->string('mak')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('tahun_anggaran_dana')->nullable();
            $table->string('asal_dana_klpd')->nullable();
            $table->string('asal_dana_satker')->nullable();
            $table->string('status_aktif_rup')->nullable();
            $table->string('status_delete_rup')->nullable();
            $table->string('status_umumkan_rup')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket_anggaran_penyedia');
    }
};
