<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRupRoMasterTable extends Migration
{
    public function up()
    {
        Schema::create('rup_ro_master', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_program')->nullable();
            $table->string('kd_kegiatan')->nullable();
            $table->string('kd_kro')->nullable();
            $table->string('kd_ro')->nullable();
            $table->string('kd_ro_str')->nullable();
            $table->string('nama_ro')->nullable();
            $table->decimal('pagu_ro', 20, 2)->nullable();
            $table->string('kd_ro_lokal')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rup_ro_master');
    }
};
