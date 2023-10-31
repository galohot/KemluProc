<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RupMasterSatker extends Model
{
    use HasFactory;

    protected $table = 'rup_master_satker';

    protected $fillable = [
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'alamat',
        'telepon',
        'fax',
        'kodepos',
        'status_satker',
        'ket_satker',
        'jenis_satker',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
    ];

    public function strukturAnggaran()
    {
        return $this->hasOne(RupStrukturAnggaranKl::class, 'kd_satker', 'kd_satker');
    }

    public function programMasters()
    {
        return $this->hasMany(ProgramMaster::class, 'kd_satker', 'kd_satker');
    }
}