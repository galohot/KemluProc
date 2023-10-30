<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RupKroMaster extends Model
{
    use HasFactory;

    protected $table = 'rup_kro_master';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_program',
        'kd_kegiatan',
        'kd_kro',
        'kd_kro_str',
        'nama_kro',
        'pagu_kro',
        'kd_kro_lokal',
        'is_deleted',
    ];

    public function kegiatan() {
        return $this->belongsTo(KegiatanMaster::class, 'kd_kegiatan', 'kd_kegiatan');
    }
    
    public function rupRos() {
        return $this->hasMany(RupRoMaster::class, 'kd_kro', 'kd_kro');
    }
}
