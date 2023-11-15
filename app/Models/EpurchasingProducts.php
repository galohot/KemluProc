<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpurchasingProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_produk',
        'no_kontrak',
        'nama_penyedia',
        'no_produk',
        'no_produk_penyedia',
        'nama_manufaktur',
        'nama_produk',
        'nama_kategori_terkecil',
        'nama_sub_kategori_1',
        'nama_sub_kategori_2',
        'nama_sub_kategori_3',
        'nama_sub_kategori_4',
        'harga',
        'nama_komoditas',
        'jumlah_stok',
        'setuju_tolak_tanggal',
        'berlaku_sampai',
        'unit_pengukuran',
        'jenis_produk',
        'kbki_id',
        'nomor_tkdn',
        'nama_pemilik_sertifikat_tkdn',
        'tkdn_produk',
        'nilai_bmp',
        'masa_berlaku_kontrak',
        'tglkontrak_mulai',
        'tglkontrak_selesai',
        // Add more fields as needed
    ];

    protected $casts = [
        'harga' => 'json', // Assuming 'harga' field contains JSON data
    ];

    // You can add relationships, custom methods, or other model configurations here
}