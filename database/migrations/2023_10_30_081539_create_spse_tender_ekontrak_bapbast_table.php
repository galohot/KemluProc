<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpseTenderEkontrakBapbastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spse_tender_ekontrak_bapbast', function (Blueprint $table) {
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
            $table->integer('kd_tender')->nullable();
            $table->text('nama_paket')->nullable();
            $table->string('no_sppbj')->nullable();
            $table->string('no_kontrak')->nullable();
            $table->date('tgl_kontrak')->nullable();
            $table->decimal('nilai_kontrak', 15, 2)->nullable();
            $table->string('nama_ppk')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('jabatan_ppk')->nullable();
            $table->string('no_sk_ppk')->nullable();
            $table->string('jabatan_penandatangan_sk')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('alamat_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->string('wakil_sah_penyedia')->nullable();
            $table->string('jabatan_wakil_penyedia')->nullable();
            $table->string('no_bast')->nullable();
            $table->date('tgl_bast')->nullable();
            $table->string('no_bap')->nullable();
            $table->date('tgl_bap')->nullable();
            $table->decimal('besar_pembayaran', 15, 2)->nullable();
            $table->integer('progres_pekerjaan')->nullable();
            $table->string('cara_pembayaran_kontrak')->nullable();
            $table->string('status_kontrak')->nullable();
            $table->dateTime('tgl_penetapan_status_kontrak')->nullable();
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
        Schema::dropIfExists('spse_tender_ekontrak_bapbast');
    }
}
