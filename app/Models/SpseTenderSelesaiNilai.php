<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseTenderSelesaiNilai extends Model
{
    use HasFactory;

    protected $table = 'spse_tender_selesai_nilai';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'nama_satker',
        'kd_lpse',
        'kd_tender',
        'kd_paket',
        'kd_rup_paket',
        'pagu',
        'hps',
        'nilai_penawaran',
        'nilai_terkoreksi',
        'nilai_negosiasi',
        'nilai_kontrak',
        'tgl_pengumuman_tender',
        'tgl_penetapan_pemenang',
        'kd_penyedia',
        'nama_penyedia',
        'npwp_penyedia',
        'nilai_pdn_kontrak',
        'nilai_umk_kontrak',
    ];

    public function tenderSelesai()
    {
        return $this->belongsTo(SpseTenderSelesai::class, 'kd_rup', 'kd_rup_paket');
    }
}