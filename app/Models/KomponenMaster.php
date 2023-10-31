<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenMaster extends Model
{
    use HasFactory;

    protected $table = 'komponen_master';

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
        'kd_komponen_str',
        'nama_komponen',
        'pagu_komponen',
        'kd_komponen_lokal',
        'is_deleted',
    ];

    public function rupRo() {
        return $this->belongsTo(RupRoMaster::class, 'kd_ro', 'kd_ro');
    }
    
    public function subkomponens() {
        return $this->hasMany(SubkomponenMaster::class, 'kd_komponen', 'kd_komponen');
    }
}
