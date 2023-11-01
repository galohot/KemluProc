<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpsePencatatanNonTenderRealisasi extends Model
{
    use HasFactory;

    protected $table = 'spse_pencatatan_nontender_realisasi';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'kd_satker',
        'kd_lpse',
        'kd_nontender_pct',
        'kategori_pengadaan',
        'mtd_pemilihan',
        'jenis_realisasi',
        'no_realisasi',
        'tgl_realisasi',
        'nilai_realisasi',
        'dok_realisasi',
        'ket_realisasi',
        'nama_penyedia',
        'npwp_penyedia',
        'nip_ppk',
        'nama_ppk',
    ];

    public function jadwalTahapanNontender()
    {
        return $this->belongsTo(SpseJadwalTahapanNontender::class, 'kd_nontender_pct');
    }
}
