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
            $table->string('nie_id')->nullable();
            $table->string('nie_nib')->nullable();
            $table->string('nie_nama_usaha')->nullable();
            $table->string('nie_npwp')->nullable();
            $table->string('nie_klasifikasi_izin')->nullable();
            $table->dateTime('nie_tgl_terbit')->nullable();
            $table->dateTime('nie_tgl_expire')->nullable();
            $table->string('nie_nama_produk')->nullable();
            $table->string('nie_kategori')->nullable();
            $table->string('nie_sub_kategori')->nullable();
            $table->string('nie_jenis_produk')->nullable();
            $table->string('nie_hscode')->nullable();
            $table->string('nie_kelas')->nullable();
            $table->string('nie_kelas_resiko')->nullable();
            $table->string('nie_ukuran')->nullable();
            $table->string('nie_kemasan')->nullable();
            $table->string('nie_nama_pabrik')->nullable();
            $table->string('nie_negara_pabrik')->nullable();
            $table->string('nie_alamat_pabrik')->nullable();
            $table->dateTime('nie_last_update')->nullable();
            $table->string('no_suket_alkes')->nullable();
            $table->string('kd_produk_kategori')->nullable();
            $table->integer('active')->nullable();
            $table->dateTime('created_date')->nullable();
            $table->dateTime('modified_date')->nullable();
            $table->string('status')->nullable();
            $table->string('status_tayang')->nullable();
            $table->string('apakah_dapat_dibeli')->nullable();
            $table->string('nie')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('epurchasing_products');
    }
}