<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubkomponenMaster extends Model
{
    use HasFactory;

    protected $table = 'subkomponen_master';

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
        'kd_komponen',
        'kd_subkomponen',
        'kd_subkomponen_str',
        'nama_subkomponen',
        'pagu_subkomponen',
        'kd_subkomponen_lokal',
        'is_deleted',
    ];
}
