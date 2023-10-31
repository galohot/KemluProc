<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseJadwalTahapanTender extends Model
{
    use HasFactory;

    protected $table = 'spse_jadwal_tahapan_tender';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'kd_satker',
        'kd_satker_str',
        'kd_lpse',
        'kd_tender',
        'kd_tahapan',
        'nama_tahapan',
        'kd_akt',
        'nama_akt',
        'tgl_awal',
        'tgl_akhir',
    ];
}
