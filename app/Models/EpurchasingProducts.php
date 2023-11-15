<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpurchasingProducts extends Model
{
    use HasFactory;

    protected $table = 'epurchasing_products';

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
        'nie_id',
        'nie_nib',
        'nie_nama_usaha',
        'nie_npwp',
        'nie_klasifikasi_izin',
        'nie_tgl_terbit',
        'nie_tgl_expire',
        'nie_nama_produk',
        'nie_kategori',
        'nie_sub_kategori',
        'nie_jenis_produk',
        'nie_hscode',
        'nie_kelas',
        'nie_kelas_resiko',
        'nie_ukuran',
        'nie_kemasan',
        'nie_nama_pabrik',
        'nie_negara_pabrik',
        'nie_alamat_pabrik',
        'nie_last_update',
        'no_suket_alkes',
        'kd_produk_kategori',
        'active',
        'created_date',
        'modified_date',
        'status',
        'status_tayang',
        'apakah_dapat_dibeli',
        'nie',
        // Add more fields as needed
    ];

    protected $casts = [
        'harga' => 'json', // Assuming 'harga' field contains JSON data
    ];

    // You can add relationships, custom methods, or other model configurations here
}