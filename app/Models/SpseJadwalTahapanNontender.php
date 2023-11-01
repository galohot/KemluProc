<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseJadwalTahapanNontender extends Model
{
    use HasFactory;

    protected $table = 'spse_jadwal_tahapan_nontender';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'kd_satker',
        'kd_satker_str',
        'kd_lpse',
        'kd_nontender',
        'kd_tahapan',
        'nama_tahapan',
        'kd_akt',
        'nama_akt',
        'tgl_awal',
        'tgl_akhir',
    ];

    public function pengumuman()
    {
        return $this->hasOne(SpseNontenderPengumuman::class, 'kd_nontender');
    }

    public function pencatatanNontender()
    {
        return $this->hasOne(SpsePencatatanNonTender::class, 'kd_nontender_pct');
    }

    public function pencatatanNontenderRealisasi()
    {
        return $this->hasOne(SpsePencatatanNonTenderRealisasi::class, 'kd_nontender_pct');
    }

    public function nontenderEkontrakSppbj()
    {
        return $this->hasOne(SpseNontenderEkontrakSppbj::class, 'kd_nontender');
    }

    public function nontenderSelesai()
    {
        return $this->hasOne(SpseNontenderSelesai::class, 'kd_nontender');
    }

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker', 'kd_satker');
    }
}
