<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpsePencatatanNonTender extends Model
{
    use HasFactory;

    protected $table = 'spse_pencatatan_nontender';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'kd_lpse',
        'kd_nontender_pct',
        'kd_pkt_dce',
        'kd_rup',
        'nama_paket',
        'pagu',
        'total_realisasi',
        'nilai_pdn_pct',
        'nilai_umk_pct',
        'sumber_dana',
        'uraian_pekerjaan',
        'informasi_lainnya',
        'kategori_pengadaan',
        'mtd_pemilihan',
        'bukti_pembayaran',
        'status_nontender_pct',
        'status_nontender_pct_ket',
        'alasan_pembatalan',
        'nip_ppk',
        'nama_ppk',
        'tgl_buat_paket',
        'tgl_mulai_paket',
        'tgl_selesai_paket',
    ];
}
