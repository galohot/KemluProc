<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RupRoMaster extends Model
{
    protected $table = 'rup_ro_master';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_program',
        'kd_kegiatan',
        'kd_kro',
        'kd_ro',
        'kd_ro_str',
        'nama_ro',
        'pagu_ro',
        'kd_ro_lokal',
        'is_deleted',
    ];
}
