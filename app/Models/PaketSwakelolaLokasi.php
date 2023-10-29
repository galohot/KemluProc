<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketSwakelolaLokasi extends Model
{
    protected $table = 'paket_swakelola_lokasi';

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
}
