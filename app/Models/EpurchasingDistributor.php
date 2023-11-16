<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpurchasingDistributor extends Model
{
    use HasFactory;

    protected $table = 'epurchasing_distributors';

    protected $fillable = [
        'kd_penyedia_distributor',
        'nama_distributor',
        'alamat_distributor',
        'email_distributor',
        'no_telp_distributor',
        'npwp_distributor',
        // Add other fillable fields as needed
    ];

    public function paketEpurchasing()
    {
        return $this->belongsTo(EcatPaketEpurchasing::class, 'kd_penyedia_distributor', 'kd_penyedia_distributor');
    }
}