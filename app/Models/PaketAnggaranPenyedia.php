<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketAnggaranPenyedia extends Model
{
    use HasFactory;

    protected $table = 'paket_anggaran_penyedia';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'kd_rup',
        'kd_rup_lokal',
        'kd_kegiatan',
        'kd_komponen',
        'kd_subkegiatan',
        'pagu',
        'mak',
        'sumber_dana',
        'tahun_anggaran_dana',
        'asal_dana_klpd',
        'asal_dana_satker',
        'status_aktif_rup',
        'status_delete_rup',
        'status_umumkan_rup',
    ];
}
