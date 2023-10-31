<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramMaster extends Model
{
    use HasFactory;

    protected $table = 'program_master';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_program',
        'kd_program_str',
        'nama_program',
        'pagu_program',
        'kd_program_lokal',
        'is_deleted',
    ];

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker', 'kd_satker');
    }

    public function kegiatans() {
        return $this->hasMany(KegiatanMaster::class, 'kd_program', 'kd_program');
    }
}