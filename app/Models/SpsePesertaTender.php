<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpsePesertaTender extends Model
{
    use HasFactory;

    protected $table = 'spse_peserta_tender';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'kd_satker',
        'kd_satker_str',
        'kd_lpse',
        'kd_tender',
        'kd_pkt_dce',
        'kd_peserta',
        'kd_penyedia',
        'nama_penyedia',
        'npwp_penyedia',
        'nilai_penawaran',
        'nilai_terkoreksi',
        'pemenang',
        'pemenang_terverifikasi',
        'alasan',
    ];

    public function tenderPengumuman()
    {
        return $this->belongsTo(SpseTenderPengumuman::class, 'kd_tender','kd_tender');
    }
}
