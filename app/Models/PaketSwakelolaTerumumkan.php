<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketSwakelolaTerumumkan extends Model
{
    use HasFactory;
    protected $table = 'paket_swakelola_terumumkan';
    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'kd_rup',
        'nama_paket',
        'pagu',
        'tipe_swakelola',
        'volume_pekerjaan',
        'uraian_pekerjaan',
        'kd_klpd_penyelenggara',
        'nama_klpd_penyelenggara',
        'nama_satker_penyelenggara',
        'tgl_awal_pelaksanaan_kontrak',
        'tgl_akhir_pelaksanaan_kontrak',
        'tgl_buat_paket',
        'tgl_pengumuman_paket',
        'nip_ppk',
        'nama_ppk',
        'username_ppk',
        'kd_rup_lokal',
        'status_aktif_rup',
        'status_delete_rup',
        'status_umumkan_rup',
    ];

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker_str', 'kd_satker_str');
    }

    
    public function swakelolaLokasis() {
        return $this->hasMany(PaketSwakelolaLokasi::class, 'kd_rup', 'kd_rup');
    }

    public function anggaranSwakelolas()
    {
        return $this->hasOne(PaketAnggaranSwakelola::class, 'kd_rup', 'kd_rup');
    }
}