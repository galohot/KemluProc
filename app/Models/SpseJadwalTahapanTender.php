<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpseJadwalTahapanTender extends Model
{
    use HasFactory;

    protected $table = 'spse_jadwal_tahapan_tender';

    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'kd_satker',
        'kd_satker_str',
        'kd_lpse',
        'kd_tender',
        'kd_tahapan',
        'nama_tahapan',
        'kd_akt',
        'nama_akt',
        'tgl_awal',
        'tgl_akhir',
    ];

    public function pengumuman()
    {
        return $this->hasOne(SpseTenderPengumuman::class, 'kd_tender');
    }

    public function pesertaTender()
    {
        return $this->hasMany(SpsePesertaTender::class, 'kd_tender');
    }

    public function tenderSelesai()
    {
        return $this->hasOne(SpseTenderSelesai::class, 'kd_tender');
    }

    public function tenderSelesaiNilai()
    {
        return $this->hasOne(SpseTenderSelesaiNilai::class, 'kd_tender');
    }

    public function kontrak()
    {
        return $this->hasOne(SpseTenderEkontrakKontrak::class, 'kd_tender');
    }

    public function spmkspp()
    {
        return $this->hasOne(SpseTenderEkontrakSpmkspp::class, 'kd_tender');
    }

    public function sppbj()
    {
        return $this->hasOne(SpseTenderEkontrakSppbj::class, 'kd_tender');
    }

    public function bapbast()
    {
        return $this->hasOne(SpseTenderEkontrakBapbast::class, 'kd_tender');
    }

    public function rupMasterSatker()
    {
        return $this->belongsTo(RupMasterSatker::class, 'kd_satker', 'kd_satker');
    }
}
