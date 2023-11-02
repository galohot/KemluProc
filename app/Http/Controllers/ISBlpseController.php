<?php

namespace App\Http\Controllers;

use App\Models\RupMasterSatker;
use App\Models\SpseJadwalTahapanTender;
use App\Models\SpsePesertaTender;
use App\Models\SpseTenderEkontrakBapbast;
use App\Models\SpseTenderEkontrakKontrak;
use App\Models\SpseTenderEkontrakSpmkspp;
use App\Models\SpseTenderEkontrakSppbj;
use App\Models\SpseTenderPengumuman;
use App\Models\SpseTenderSelesai;
use App\Models\SpseTenderSelesaiNilai;
use Illuminate\Http\Request;

class ISBlpseController extends Controller
{
    public function show($kd_satker) {
        $rupMasterSatker = RupMasterSatker::where('kd_satker', $kd_satker)->first(); // Retrieve the RupMasterSatker model
        $jadwalTahapanTender = SpseJadwalTahapanTender::where('kd_satker', $kd_satker)->get();
        $pesertaTender = SpsePesertaTender::where('kd_satker', $kd_satker)->get();
        $bapbast = SpseTenderEkontrakBapbast::where('kd_satker', $kd_satker)->get();
        $kontrak = SpseTenderEkontrakKontrak::where('kd_satker', $kd_satker)->get();
        $spmkspp = SpseTenderEkontrakSpmkspp::where('kd_satker', $kd_satker)->get();
        $sppbj = SpseTenderEkontrakSppbj::where('kd_satker', $kd_satker)->get();
        $pengumuman = SpseTenderPengumuman::where('kd_satker', $kd_satker)->get();
        $tenderSelesai = SpseTenderSelesai::where('kd_satker', $kd_satker)->get();
        $tenderSelesaiNilai = SpseTenderSelesaiNilai::where('kd_satker', $kd_satker)->get();

        return view('lpse.index', compact(
            'rupMasterSatker', // Pass $rupMasterSatker to the view
            'kd_satker', 
            'jadwalTahapanTender', 
            'pesertaTender', 
            'bapbast', 
            'kontrak', 
            'spmkspp', 
            'sppbj', 
            'pengumuman', 
            'tenderSelesai', 
            'tenderSelesaiNilai'
        ));
    }
}
