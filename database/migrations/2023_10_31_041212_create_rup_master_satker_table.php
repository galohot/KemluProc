<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRupMasterSatkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rup_master_satker', function (Blueprint $table) {
            $table->id();
            $table->integer('kd_satker');
            $table->integer('kd_satker_str');
            $table->string('nama_satker');
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('status_satker')->nullable();
            $table->string('ket_satker')->nullable();
            $table->string('jenis_satker')->nullable();
            $table->string('kd_klpd');
            $table->string('nama_klpd');
            $table->string('jenis_klpd');
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
        Schema::dropIfExists('rup_master_satker');
    }
}
