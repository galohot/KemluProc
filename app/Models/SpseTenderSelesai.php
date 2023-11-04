<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseTenderSelesai extends Model
{
    use HasFactory;

    protected $table = 'spse_tender_selesai';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'kd_lpse',
        'nama_lpse',
        'kd_tender',
        'kd_pkt_dce',
        'kd_rup',
        'nama_paket',
        'pagu',
        'hps',
        'sumber_dana',
        'mak',
        'kualifikasi_paket',
        'jenis_pengadaan',
        'mtd_pemilihan',
        'mtd_evaluasi',
        'mtd_kualifikasi',
        'kontrak_pembayaran',
        'status_tender',
        'tgl_pengumuman_tender',
        'tgl_penetapan_pemenang',
        'url_lpse',
    ];

    public function tenderPengumuman()
    {
        return $this->belongsTo(SpseTenderPengumuman::class, 'kd_tender');
    }
}
