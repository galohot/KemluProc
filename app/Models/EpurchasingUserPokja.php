<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpurchasingUserPokja extends Model
{
    use HasFactory;

    protected $table = 'epurchasing_user_pokjas';

    protected $fillable = [
        'kd_user_pegawai',
        'kd_klpd',
        'kd_satker',
        'nama_lengkap',
        'nip_pegawai',
        'jabatan_pegawai',
        // Add any additional columns as needed
    ];

    public function paketEpurchasing()
    {
        return $this->belongsTo(EcatPaketEpurchasing::class, 'kd_user_pokja','kd_user_pegawai');
    }
}