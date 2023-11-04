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

    public function nontenderPengumuman()
    {
        return $this->belongsTo(SpseNontenderPengumuman::class, 'kd_nontender');
    }

}
