<?php

namespace App\Http\Controllers;

use App\Models\SpseTenderPengumuman;
use App\Models\SpseTenderSelesai;
use App\Models\SpseTenderSelesaiNilai;
use App\Models\SpsePesertaTender;
use App\Models\SpseJadwalTahapanTender;
use App\Models\SpseTenderEkontrakBapbast;
use App\Models\SpseTenderEkontrakKontrak;
use App\Models\SpseTenderEkontrakSpmkspp;
use App\Models\SpseTenderEkontrakSppbj;

class ISBlpseController extends Controller
{
    public function show($kd_satker) {
        $tenderPengumumans = SpseTenderPengumuman::where('kd_satker', $kd_satker)->get();
        $tenderSelesais = SpseTenderSelesai::where('kd_satker', $kd_satker)->get();
        $tenderSelesaiNilais = SpseTenderSelesaiNilai::where('kd_satker', $kd_satker)->get();
        $pesertaTenders = SpsePesertaTender::where('kd_satker', $kd_satker)->get();
        $jadwalTahapans = SpseJadwalTahapanTender::where('kd_satker', $kd_satker)->get();
        $tenderEkontrakBapbasts = SpseTenderEkontrakBapbast::where('kd_satker', $kd_satker)->get();
        $tenderEkontrakKontraks = SpseTenderEkontrakKontrak::where('kd_satker', $kd_satker)->get();
        $tenderEkontrakSpmkspps = SpseTenderEkontrakSpmkspp::where('kd_satker', $kd_satker)->get();
        $tenderEkontrakSppbjs = SpseTenderEkontrakSppbj::where('kd_satker', $kd_satker)->get();

        return view('lpse.index', compact(
            'tenderPengumumans',
            'tenderSelesais',
            'tenderSelesaiNilais',
            'pesertaTenders',
            'jadwalTahapans',
            'tenderEkontrakBapbasts',
            'tenderEkontrakKontraks',
            'tenderEkontrakSpmkspps',
            'tenderEkontrakSppbjs'
        ));
    }
}