<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseTenderEkontrakKontrak extends Model
{
    use HasFactory;

    protected $table = 'spse_tender_ekontrak_kontrak';

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
        'lingkup_pekerjaan',
        'no_sppbj',
        'no_kontrak',
        'tgl_kontrak',
        'tgl_kontrak_awal',
        'tgl_kontrak_akhir',
        'kota_kontrak',
        'nip_ppk',
        'nama_ppk',
        'jabatan_ppk',
        'no_sk_ppk',
        'kd_penyedia',
        'nama_penyedia',
        'npwp_penyedia',
        'bentuk_usaha_penyedia',
        'tipe_penyedia',
        'anggota_kso',
        'wakil_sah_penyedia',
        'jabatan_wakil_penyedia',
        'nama_rek_bank',
        'no_rek_bank',
        'nama_pemilik_rek_bank',
        'nilai_kontrak',
        'alasan_ubah_nilai_kontrak',
        'alasan_nilai_kontrak_10_persen',
        'nilai_pdn_kontrak',
        'nilai_umk_kontrak',
        'jenis_kontrak',
        'informasi_lainnya',
        'status_kontrak',
        'tgl_penetapan_status_kontrak',
        'alasan_penetapan_status_kontrak',
        'apakah_addendum',
        'versi_addendum',
        'alasan_addendum',
    ];

    public function tenderPengumuman()
    {
        return $this->belongsTo(SpseTenderPengumuman::class, 'kd_tender');
    }
}
