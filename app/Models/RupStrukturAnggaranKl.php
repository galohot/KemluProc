<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RupStrukturAnggaranKl extends Model
{
    use HasFactory;

    protected $table = 'rup_struktur_anggaran_kl';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'belanja_pegawai',
        'belanja_barjas',
        'belanja_modal',
        'belanja_pengadaan_sosial',
        'belanja_nonpengadaan_sosial',
        'total_belanja_sosial',
        'belanja_pengadaan_hibah',
        'belanja_nonpengadaan_hibah',
        'total_belanja_hibah',
        'belanja_pengadaan_lainnya',
        'belanja_nonpengadaan_lainnya',
        'total_belanja_lainnya',
        'total_belanja',
    ];

    public function masterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker_str', 'kd_satker_str');
    }
}