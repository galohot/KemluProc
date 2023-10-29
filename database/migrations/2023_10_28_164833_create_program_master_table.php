<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_master', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_program')->nullable();
            $table->string('kd_program_str')->nullable();
            $table->string('nama_program')->nullable();
            $table->decimal('pagu_program', 15, 2)->nullable();
            $table->string('kd_program_lokal')->nullable();
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
        Schema::dropIfExists('program_master');
    }
};
