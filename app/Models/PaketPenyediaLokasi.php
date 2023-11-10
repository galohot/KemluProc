<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPenyediaLokasi extends Model
{
    protected $table = 'paket_penyedia_lokasi';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'kd_rup',
        'detail_lokasi',
        'kd_kab_kota',
        'kab_kota',
        'kd_provinsi',
        'provinsi',
    ];

    public function penyediaLokasi()
    {
        return $this->belongsTo(PaketPenyediaTerumumkan::class, 'kd_rup', 'kd_rup');
    }
}