<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpurchasingDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epurchasing_distributors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kd_penyedia_distributor')->nullable();
            $table->string('nama_distributor')->nullable();
            $table->text('alamat_distributor')->nullable();
            $table->string('email_distributor')->nullable();
            $table->string('no_telp_distributor')->nullable();
            $table->string('npwp_distributor')->nullable();
            // Add other columns as needed

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
        Schema::dropIfExists('epurchasing_distributors');
    }
}