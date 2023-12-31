<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseTenderPengumuman extends Model
{
    use HasFactory;

    protected $table = 'spse_tender_pengumuman';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'kd_lpse',
        'nama_lpse',
        'kd_tender',
        'kd_pkt_dce',
        'kd_rup',
        'nama_paket',
        'pagu',
        'hps',
        'sumber_dana',
        'kualifikasi_paket',
        'jenis_pengadaan',
        'mtd_pemilihan',
        'mtd_evaluasi',
        'mtd_kualifikasi',
        'kontrak_pembayaran',
        'status_tender',
        'tanggal_status',
        'versi_tender',
        'ket_ditutup',
        'ket_diulang',
        'tgl_buat_paket',
        'tgl_kolektif_kolegial',
        'tgl_pengumuman_tender',
        'nip_ppk',
        'nama_ppk',
        'nip_pokja',
        'nama_pokja',
        'lokasi_pekerjaan',
        'url_lpse',
    ];


    public function jadwalTahapan()
    {
        return $this->hasMany(SpseJadwalTahapanTender::class, 'kd_tender');
    }

    public function tenderSelesai()
    {
        return $this->hasOne(SpseTenderSelesai::class, 'kd_tender');
    }

    public function tenderSelesaiNilai()
    {
        return $this->hasOne(SpseTenderSelesaiNilai::class, 'kd_tender');
    }

    public function tenderEkontrakKontrak()
    {
        return $this->hasOne(SpseTenderEkontrakKontrak::class, 'kd_tender');
    }

    public function tenderEkontrakSppbj()
    {
        return $this->hasOne(SpseTenderEkontrakSppbj::class, 'kd_tender');
    }

    public function pesertaTender()
    {
        return $this->hasMany(SpsePesertaTender::class, 'kd_tender','kd_tender');
    }

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker_str', 'kd_satker_str');
    }

    public function penyediaTerumumkan()
    {
        return $this->belongsTo(PaketPenyediaTerumumkan::class, 'kd_rup', 'kd_rup');
    }
}