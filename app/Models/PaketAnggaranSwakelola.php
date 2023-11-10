<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketAnggaranSwakelola extends Model
{
    use HasFactory;

    protected $table = 'paket_anggaran_swakelola';

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

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker_str', 'kd_satker_str');
    }

    public function anggaranSwakelola()
    {
        return $this->belongsTo(PaketSwakelolaTerumumkan::class, 'kd_rup', 'kd_rup');
    }
}