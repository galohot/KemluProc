<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseTenderEkontrakSpmkspp extends Model
{
    use HasFactory;

    protected $table = 'spse_tender_ekontrak_spmkspp';

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
        'no_spmk_spp',
        'tgl_spmk_spp',
        'tgl_mulai_pekerjaan',
        'tgl_selesai_pekerjaan',
        'waktu_penyelesaian',
        'kota_spmk_spp',
        'alamat_pengiriman',
        'nama_ppk',
        'nip_ppk',
        'jabatan_ppk',
        'nama_penyedia',
        'alamat_penyedia',
        'npwp_penyedia',
        'wakil_sah_penyedia',
        'jabatan_wakil_penyedia',
    ];
}
