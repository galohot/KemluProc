<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcatPaketEpurchasingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecat_paket_epurchasing', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->integer('satker_id')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('alamat_satker')->nullable();
            $table->string('npwp_satker')->nullable();
            $table->integer('kd_paket')->nullable();
            $table->string('no_paket')->nullable();
            $table->text('nama_paket')->nullable();
            $table->integer('kd_rup')->nullable();
            $table->string('nama_sumber_dana')->nullable();
            $table->string('kode_anggaran')->nullable();
            $table->integer('kd_komoditas')->nullable();
            $table->integer('kd_produk')->nullable();
            $table->integer('kd_penyedia')->nullable();
            $table->integer('kd_penyedia_distributor')->nullable();
            $table->integer('jml_jenis_produk')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->decimal('kuantitas', 15, 2)->nullable();
            $table->decimal('harga_satuan', 15, 2)->nullable();
            $table->decimal('ongkos_kirim', 15, 2)->nullable();
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->integer('kd_user_pokja')->nullable();
            $table->string('no_telp_user_pokja')->nullable();
            $table->string('email_user_pokja')->nullable();
            $table->integer('kd_user_ppk')->nullable();
            $table->string('ppk_nip')->nullable();
            $table->string('jabatan_ppk')->nullable();
            $table->date('tanggal_buat_paket')->nullable();
            $table->date('tanggal_edit_paket')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('status_paket')->nullable();
            $table->string('paket_status_str')->nullable();
            $table->text('catatan_produk')->nullable();
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
        Schema::dropIfExists('ecat_paket_epurchasing');
    }
}
