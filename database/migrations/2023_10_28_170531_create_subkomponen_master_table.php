<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkomponenMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkomponen_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->unsignedInteger('kd_satker')->nullable();
            $table->string('kd_program')->nullable();
            $table->string('kd_kegiatan')->nullable();
            $table->string('kd_kro')->nullable();
            $table->string('kd_ro')->nullable();
            $table->string('kd_komponen')->nullable();
            $table->string('kd_subkomponen')->nullable();
            $table->string('kd_subkomponen_str')->nullable();
            $table->string('nama_subkomponen')->nullable();
            $table->unsignedBigInteger('pagu_subkomponen')->nullable();
            $table->string('kd_subkomponen_lokal')->nullable();
            $table->boolean('is_deleted')->nullable();
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
        Schema::dropIfExists('subkomponen_master');
    }
};
