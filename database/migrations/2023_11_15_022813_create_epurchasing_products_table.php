<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpurchasingProductsTable extends Migration
{
    public function up()
    {
        Schema::create('epurchasing_products', function (Blueprint $table) {
            $table->id();
            $table->string('kd_produk')->nullable();
            $table->string('no_kontrak')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('no_produk')->nullable();
            $table->string('no_produk_penyedia');
            $table->string('nama_manufaktur')->nullable();
            $table->string('nama_produk')->nullable();
            $table->string('nama_kategori_terkecil')->nullable();
            $table->string('nama_sub_kategori_1')->nullable();
            $table->string('nama_sub_kategori_2')->nullable();
            $table->string('nama_sub_kategori_3')->nullable();
            $table->string('nama_sub_kategori_4')->nullable();
            $table->json('harga')->nullable(); // Assuming JSON data for the 'harga' field
            $table->string('nama_komoditas')->nullable();
            $table->decimal('jumlah_stok', 10, 2)->nullable();
            $table->dateTime('setuju_tolak_tanggal')->nullable();
            $table->dateTime('berlaku_sampai')->nullable();
            $table->string('unit_pengukuran')->nullable();
            $table->string('jenis_produk')->nullable();
            $table->string('kbki_id')->nullable();
            $table->string('nomor_tkdn')->nullable();
            $table->string('nama_pemilik_sertifikat_tkdn')->nullable();
            $table->string('tkdn_produk')->nullable();
            $table->string('nilai_bmp')->nullable();
            $table->string('masa_berlaku_kontrak')->nullable();
            $table->dateTime('tglkontrak_mulai')->nullable();
            $table->dateTime('tglkontrak_selesai')->nullable();
            // Add more columns as needed

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('epurchasing_products');
    }
}