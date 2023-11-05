<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseNontenderPengumuman extends Model
{
    use HasFactory;

    protected $table = 'spse_nontender_pengumuman';

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
        'kd_nontender',
        'kd_pkt_dce',
        'kd_rup',
        'nama_paket',
        'pagu',
        'hps',
        'sumber_dana',
        'mak',
        'kualifikasi_paket',
        'jenis_pengadaan',
        'mtd_pemilihan',
        'kontrak_pembayaran',
        'status_nontender',
        'versi_nontender',
        'ket_diulang',
        'ket_ditutup',
        'tgl_buat_paket',
        'tgl_kolektif_kolegial',
        'tgl_pengumuman_nontender',
        'dibuat_oleh',
        'nip_pembuat_paket',
        'nama_pembuat_paket',
        'lokasi_pekerjaan',
        'url_lpse',
    ];

    public function jadwalTahapan()
    {
        return $this->hasMany(SpseJadwalTahapanNontender::class, 'kd_nontender');
    }

    public function nontenderSelesai()
    {
        return $this->hasOne(SpseNontenderSelesai::class, 'kd_nontender');
    }

    // public function nontenderEkontrakSpmkspp()
    // {
    //     return $this->hasOne(SpseNontenderEkontrakSpmkspp::class, 'kd_nontender');
    // }

    public function nontenderEkontrakSppbj()
    {
        return $this->hasOne(SpseNontenderEkontrakSppbj::class, 'kd_nontender');
    }

    public function pencatatanNonTender()
    {
        return $this->hasOne(SpsePencatatanNonTender::class, 'kd_nontender_pct');
    }

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker', 'kd_satker');
    }

    public function penyediaTerumumkan()
    {
        return $this->belongsTo(PaketPenyediaTerumumkan::class, 'kd_rup', 'kd_rup');
    }
}
