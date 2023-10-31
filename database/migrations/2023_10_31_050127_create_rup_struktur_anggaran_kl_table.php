<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRupStrukturAnggaranKlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rup_struktur_anggaran_kl', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->decimal('belanja_pegawai', 15, 2)->nullable();
            $table->decimal('belanja_barjas', 15, 2)->nullable();
            $table->decimal('belanja_modal', 15, 2)->nullable();
            $table->decimal('belanja_pengadaan_sosial', 15, 2)->nullable();
            $table->decimal('belanja_nonpengadaan_sosial', 15, 2)->nullable();
            $table->decimal('total_belanja_sosial', 15, 2)->nullable();
            $table->decimal('belanja_pengadaan_hibah', 15, 2)->nullable();
            $table->decimal('belanja_nonpengadaan_hibah', 15, 2)->nullable();
            $table->decimal('total_belanja_hibah', 15, 2)->nullable();
            $table->decimal('belanja_pengadaan_lainnya', 15, 2)->nullable();
            $table->decimal('belanja_nonpengadaan_lainnya', 15, 2)->nullable();
            $table->decimal('total_belanja_lainnya', 15, 2)->nullable();
            $table->decimal('total_belanja', 15, 2)->nullable();
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
        Schema::dropIfExists('rup_struktur_anggaran_kl');
    }
}
