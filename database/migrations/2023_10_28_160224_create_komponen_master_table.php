<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomponenMasterTable extends Migration
{
    public function up()
    {
        Schema::create('komponen_master', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran');
            $table->string('kd_klpd');
            $table->string('nama_klpd');
            $table->string('jenis_klpd');
            $table->integer('kd_satker');
            $table->string('kd_program');
            $table->string('kd_kegiatan');
            $table->string('kd_kro');
            $table->string('kd_ro');
            $table->string('kd_komponen');
            $table->string('kd_komponen_str');
            $table->string('nama_komponen');
            $table->decimal('pagu_komponen', 15, 2);
            $table->string('kd_komponen_lokal')->nullable();
            $table->boolean('is_deleted');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komponen_master');
    }
};
