<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpurchasingKomoditas extends Model
{
    use HasFactory;

    protected $table = 'epurchasing_komoditas';

    protected $fillable = [
        'kd_komoditas',
        'nama_komoditas',
        'jenis_katalog',
        'nama_instansi_katalog',
        'kd_instansi_katalog',
        // Add other fillable fields as needed
    ];

    public function paketEpurchasing()
    {
        return $this->belongsTo(EcatPaketEpurchasing::class, 'kd_komoditas', 'kd_komoditas');
    }
}