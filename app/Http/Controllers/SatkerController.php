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
            'paketPenyediaTerumumkans.paketEcats.epurchasingProduct',
            'paketPenyediaTerumumkans.paketEcats.epurchasingPenyedia',
            'paketPenyediaTerumumkans.paketEcats.epurchasingKomoditas',
            'paketPenyediaTerumumkans.paketEcats.epurchasingDistributor',
            'paketSwakelolaTerumumkans',
        ])->where('kd_satker_str', $kd_satker_str)->first();

        // Retrieve the RupMasterSatker instance using kd_satker_str
        $rupMasterSatker = RupMasterSatker::where('kd_satker_str', $kd_satker_str)->first();

        // Check if the instance exists
        if (!$rupMasterSatker) {
            // Handle the case where the instance is not found, for example, redirect to an error page.
            return redirect()->route('error.page');
        }

        // Get the kd_satker value from the RupMasterSatker instance
        $kdSatker = $rupMasterSatker->kd_satker;

        // Count paketPenyediaTerumumkans where metode_pengadaan is 'tender'
        $countTender = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'Tender')->count();
        $countEpurchasing = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'e-Purchasing')->count();
        $countPaketPenyedia = $rupMasterSatker->paketPenyediaTerumumkans->count();
        $countPaketSwakelola = $rupMasterSatker->paketSwakelolaTerumumkans->count();


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
            
        $kdRupEpurchasing = PaketPenyediaTerumumkan::join('ecat_paket_epurchasing', 'paket_penyedia_terumumkan.kd_rup', '=', 'ecat_paket_epurchasing.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker', $kdSatker)
            ->where('ecat_paket_epurchasing.satker_id', $kdSatker)
            ->distinct()
            ->pluck('paket_penyedia_terumumkan.kd_rup')
            ->toArray();

        $countKdRupTercatat = count($kdRupTercatat);
        $countKdRupEpurchasing = count($kdRupEpurchasing);

        // Sum of 'pagu', 'total_realisasi', 'nilai_pdn_pct', 'nilai_umk_pct' from SpsePencatatanNonTender
        $sumPagu = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('pagu');
        $sumTotalRealisasi = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('total_realisasi');
        $sumNilaiPdnPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_pdn_pct');
        $sumNilaiUmkPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_umk_pct');

        

        return view('satker.home', compact('rupMasterSatker', 'totalPaguProgram','countPaketPenyedia','countPaketSwakelola', 'countTender','countEpurchasing','countNotTender','countKdRupEpurchasing', 'countKdRupTercatat', 'sumPagu', 'sumTotalRealisasi', 'sumNilaiPdnPct', 'sumNilaiUmkPct'));
    }
}