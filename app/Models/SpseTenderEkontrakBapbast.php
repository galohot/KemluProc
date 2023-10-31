<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseTenderEkontrakBapbast extends Model
{
    use HasFactory;

    protected $table = 'spse_tender_ekontrak_bapbast';

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
        'kd_tender',
        'nama_paket',
        'no_sppbj',
        'no_kontrak',
        'tgl_kontrak',
        'nilai_kontrak',
        'nama_ppk',
        'nip_ppk',
        'jabatan_ppk',
        'no_sk_ppk',
        'jabatan_penandatangan_sk',
        'nama_penyedia',
        'alamat_penyedia',
        'npwp_penyedia',
        'wakil_sah_penyedia',
        'jabatan_wakil_penyedia',
        'no_bast',
        'tgl_bast',
        'no_bap',
        'tgl_bap',
        'besar_pembayaran',
        'progres_pekerjaan',
        'cara_pembayaran_kontrak',
        'status_kontrak',
        'tgl_penetapan_status_kontrak',
        'alasan_penetapan_status_kontrak',
        'apakah_addendum',
        'versi_addendum',
        'alasan_addendum',
    ];
}
