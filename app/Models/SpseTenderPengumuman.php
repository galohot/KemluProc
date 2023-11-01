<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseTenderPengumuman extends Model
{
    use HasFactory;

    protected $table = 'spse_tender_pengumuman';

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
        'kualifikasi_paket',
        'jenis_pengadaan',
        'mtd_pemilihan',
        'mtd_evaluasi',
        'mtd_kualifikasi',
        'kontrak_pembayaran',
        'status_tender',
        'tanggal_status',
        'versi_tender',
        'ket_ditutup',
        'ket_diulang',
        'tgl_buat_paket',
        'tgl_kolektif_kolegial',
        'tgl_pengumuman_tender',
        'nip_ppk',
        'nama_ppk',
        'nip_pokja',
        'nama_pokja',
        'lokasi_pekerjaan',
        'url_lpse',
    ];

    public function jadwalTahapanTender()
    {
        return $this->belongsTo(SpseJadwalTahapanTender::class, 'kd_tender');
    }
}
