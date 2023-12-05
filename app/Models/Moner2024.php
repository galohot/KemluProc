<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moner2024 extends Model
{
    use HasFactory;

    protected $table = 'moner_2024';

    protected $fillable = [
        'nama_satker',
        'kode',
        'nama_program',
        'pagu_program',
        'pagu_pengadaan',
        'pagu_terumumkan',
        'selisih',
        'persentase'
    ];

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'nama_satker', 'nama_satker');
    }
}