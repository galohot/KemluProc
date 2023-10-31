<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseNontenderEkontrakSppbjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_nontender_ekontrak_sppbj', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('jenis_klpd')->nullable();
            $table->integer('kd_satker')->nullable();
            $table->string('kd_satker_str')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('alamat_satker')->nullable();
            $table->integer('kd_lpse')->nullable();
            $table->integer('kd_nontender')->nullable();
            $table->text('nama_paket')->nullable();
            $table->string('mtd_pengadaan')->nullable();
            $table->string('no_sppbj')->nullable();
            $table->string('lampiran_sppbj')->nullable();
            $table->timestamp('tgl_sppbj')->nullable();
            $table->string('kota_sppbj')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('nama_ppk')->nullable();
            $table->string('jabatan_ppk')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->decimal('harga_final', 15, 2)->nullable();
            $table->decimal('nilai_jaminan_pelaksanaan', 15, 2)->nullable();
            $table->integer('masa_berlaku_jaminan')->nullable();
            $table->string('status_kontrak')->nullable();
            $table->timestamp('tgl_penetapan_status_kontrak')->nullable();
            $table->string('alasan_penetapan_status_kontrak')->nullable();
            $table->string('apakah_addendum')->nullable();
            $table->integer('versi_addendum')->nullable();
            $table->string('alasan_addendum')->nullable();
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
        Schema::dropIfExists('spse_nontender_ekontrak_sppbj');
    }
}
