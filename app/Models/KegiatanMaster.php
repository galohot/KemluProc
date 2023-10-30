<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanMaster extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_master';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_program',
        'kd_kegiatan',
        'kd_kegiatan_str',
        'nama_kegiatan',
        'pagu_kegiatan',
        'kd_kegiatan_lokal',
        'is_deleted',
    ];

    public function program() {
        return $this->belongsTo(ProgramMaster::class, 'kd_program', 'kd_program');
    }
    
    public function rupKros() {
        return $this->hasMany(RupKroMaster::class, 'kd_kegiatan', 'kd_kegiatan');
    }
}
