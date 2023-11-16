<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpurchasingPenyedia extends Model
{
    use HasFactory;

    protected $table = 'epurchasing_penyedias';
    
    protected $fillable = [
        'kd_penyedia',
        'nama_penyedia',
        'penyedia_ukm',
        'alamat_penyedia',
        'email_penyedia',
        'no_telp_penyedia',
        'npwp_penyedia',
        'kbli2020_penyedia',
    ];

    public function paketEpurchasing()
    {
        return $this->belongsTo(EcatPaketEpurchasing::class, 'kd_penyedia', 'kd_penyedia');
    }
    
}