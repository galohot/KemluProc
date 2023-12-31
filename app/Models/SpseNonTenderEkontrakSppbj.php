<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseNonTenderEkontrakSppbj extends Model
{
    use HasFactory;

    protected $table = 'spse_nontender_ekontrak_sppbj';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'alamat_satker',
        'kd_lpse',
        'kd_nontender',
        'nama_paket',
        'mtd_pengadaan',
        'no_sppbj',
        'lampiran_sppbj',
        'tgl_sppbj',
        'kota_sppbj',
        'nip_ppk',
        'nama_ppk',
        'jabatan_ppk',
        'nama_penyedia',
        'npwp_penyedia',
        'harga_final',
        'nilai_jaminan_pelaksanaan',
        'masa_berlaku_jaminan',
        'status_kontrak',
        'tgl_penetapan_status_kontrak',
        'alasan_penetapan_status_kontrak',
        'apakah_addendum',
        'versi_addendum',
        'alasan_addendum',
    ];

    public function nontenderPengumuman()
    {
        return $this->belongsTo(SpseNontenderPengumuman::class, 'kd_nontender');
    }
}
