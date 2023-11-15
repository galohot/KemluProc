<?php

namespace App\Http\Controllers;

use App\Models\RupMasterSatker;
use App\Models\PaketPenyediaTerumumkan;
use App\Models\PaketSwakelolaTerumumkan;
use App\Models\SpsePencatatanNonTender;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    public function show($kd_satker_str)
    {
        $rupMasterSatker = RupMasterSatker::with([
            'programMasters.kegiatans.rupKros.rupRos.komponens.subkomponens',
            'paketPenyediaTerumumkans.pencatatanNonTender.realisasiNonTenders',
            'paketPenyediaTerumumkans.tenderSelesai.tenderSelesaiNilais',
            'paketPenyediaTerumumkans.paketEcats',
            'paketSwakelolaTerumumkans',
        ])->where('kd_satker_str', $kd_satker_str)->first();

        // Count paketPenyediaTerumumkans where metode_pengadaan is 'tender'
        $countTender = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'Tender')->count();

        // Count paketPenyediaTerumumkans where metode_pengadaan is not 'tender'
        $countNotTender = $rupMasterSatker->paketPenyediaTerumumkans->whereNotIn('metode_pengadaan', ['Tender'])->count();

        $totalPaguProgram = $rupMasterSatker->programMasters->sum('pagu_program');

        // Perform the inner join and get the distinct kd_rup values
        $kdRupTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->distinct()
            ->pluck('paket_penyedia_terumumkan.kd_rup')
            ->toArray();

        $countKdRupTercatat = count($kdRupTercatat);

        // Sum of 'pagu', 'total_realisasi', 'nilai_pdn_pct', 'nilai_umk_pct' from SpsePencatatanNonTender
        $sumPagu = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('pagu');
        $sumTotalRealisasi = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('total_realisasi');
        $sumNilaiPdnPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_pdn_pct');
        $sumNilaiUmkPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_umk_pct');

        

        return view('satker.index', compact('rupMasterSatker', 'totalPaguProgram', 'countTender', 'countNotTender', 'countKdRupTercatat', 'sumPagu', 'sumTotalRealisasi', 'sumNilaiPdnPct', 'sumNilaiUmkPct'));
    }
}