<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BelaTokodaringRealisasi extends Model
{
    use HasFactory;

    protected $table = 'bela_tokodaring_realisasi';

    protected $fillable = [
        'kd_klpd',
        'nama_klpd',
        'kd_satker',
        'nama_satker',
        'order_id',
        'order_desc',
        'valuasi',
        'kategori',
        'metode_bayar',
        'tanggal_transaksi',
        'marketplace',
        'nama_merchant',
        'jenis_transaksi',
        'kota_kab',
        'provinsi',
        'nama_pemesan',
        'status_verif',
        'sumber_data',
        'status_konfirmasi_ppmse',
        'keterangan_ppmse',
    ];
}
