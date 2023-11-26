<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpurchasingUserPokjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epurchasing_user_pokjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kd_user_pegawai')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->unsignedBigInteger('kd_satker')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('nip_pegawai')->nullable();
            $table->string('jabatan_pegawai')->nullable();
            $table->timestamps();

            // Add any additional columns as needed

            // Foreign key relationships if necessary
            // $table->foreign('kd_user_pegawai')->references('id')->on('other_table');
            // $table->foreign('kd_satker')->references('id')->on('another_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('epurchasing_user_pokjas');
    }
}
