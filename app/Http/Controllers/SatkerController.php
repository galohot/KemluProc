<?php

namespace App\Http\Controllers;

use App\Models\EcatPaketEpurchasing;
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
        $countTenderSeleksi = $rupMasterSatker->paketPenyediaTerumumkans
        ->whereIn('metode_pengadaan', ['Tender', 'Seleksi'])
        ->count();
        
        $sumPaguTenderSeleksi = $rupMasterSatker->paketPenyediaTerumumkans
        ->whereIn('metode_pengadaan', ['Tender', 'Seleksi'])
        ->sum('pagu');
        
        
        $countEpurchasing = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'e-Purchasing')->count();

        
        $sumPaguEpurchasing = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'e-Purchasing')->sum('pagu');

        $countPdn = $rupMasterSatker->paketPenyediaTerumumkans->where('status_pdn', 'PDN')->count();
        $sumPaguPdn = $rupMasterSatker->paketPenyediaTerumumkans->where('status_pdn', 'PDN')->sum('pagu');
        
        $countUkm = $rupMasterSatker->paketPenyediaTerumumkans->where('status_ukm', 'UKM')->count();
        $sumPaguUkm = $rupMasterSatker->paketPenyediaTerumumkans->where('status_ukm', 'UKM')->sum('pagu');
        
        $countPaketPenyedia = $rupMasterSatker->paketPenyediaTerumumkans->count();
        $countPaketSwakelola = $rupMasterSatker->paketSwakelolaTerumumkans->count();
        $sumPaguPenyediaTerumumkan = $rupMasterSatker->paketPenyediaTerumumkans->sum('pagu');
        $sumPaguSwakelolaTerumumkan = $rupMasterSatker->paketSwakelolaTerumumkans->sum('pagu');


        // Count paketPenyediaTerumumkans where metode_pengadaan is not 'tender'
        $sumPaguNonTender = $rupMasterSatker->paketPenyediaTerumumkans->whereNotIn('metode_pengadaan', ['Tender','Seleksi','e-Purchasing'])->sum('pagu');

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

        $countPdnTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->whereNotNull('spse_pencatatan_nontender.nilai_pdn_pct') // Add this line to filter non-null values
            ->distinct()
            ->count('spse_pencatatan_nontender.nilai_pdn_pct');
            
        $countUkmTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->whereNotNull('spse_pencatatan_nontender.nilai_umk_pct') // Add this line to filter non-null values
            ->distinct()
            ->count('spse_pencatatan_nontender.nilai_umk_pct');
        
        // $kdRupTercatat now holds the count of non-null values in the 'nilai_pdn_pct' field

        $countKdRupTercatat = count($kdRupTercatat);
        $countKdRupEpurchasing = count($kdRupEpurchasing);

        // Sum of 'pagu', 'total_realisasi', 'nilai_pdn_pct', 'nilai_umk_pct' from SpsePencatatanNonTender
        $sumPaguPencatatanNonTender = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('pagu');
        $sumPaguPdnNonTender = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_pdn_pct');
        $sumPaguUkmNonTender = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_umk_pct');
        $sumPaguEpurchasingProses = EcatPaketEpurchasing::whereIn('kd_rup', $kdRupEpurchasing)->sum('total_harga');
        $sumTotalRealisasi = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('total_realisasi');
        $sumNilaiPdnPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_pdn_pct');
        $sumNilaiUmkPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->sum('nilai_umk_pct');
        $nonTenderUpdatedAt = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->first('updated_at');

        // Access the formatted updated_at value
        if ($nonTenderUpdatedAt) {
            $formattedUpdatedAt = optional($nonTenderUpdatedAt->updated_at)->format('M d, Y h:i A');
            // Now $formattedUpdatedAt contains the formatted value of updated_at
        } else {
            $formattedUpdatedAt = null;
        }
        $ePurchasingUpdatedAt = EcatPaketEpurchasing::whereIn('kd_rup', $kdRupEpurchasing)->first('updated_at');

        // Access the formatted updated_at value
        if ($ePurchasingUpdatedAt) {
            $formattedEpurchasingUpdatedAt = optional($ePurchasingUpdatedAt->updated_at)->format('M d, Y h:i A');
            // Now $formattedUpdatedAt contains the formatted value of updated_at
        } else {
            $formattedEpurchasingUpdatedAt = null;
        }

        return view('satker.home', compact(
            'rupMasterSatker', 
            'totalPaguProgram',
            'countPaketPenyedia',
            'countPaketSwakelola',
            'countTenderSeleksi',
            'countEpurchasing',
            'sumPaguNonTender',
            'countKdRupEpurchasing',
            'countKdRupTercatat',
            'sumPaguPencatatanNonTender',
            'sumPaguPenyediaTerumumkan',
            'sumPaguSwakelolaTerumumkan',
            'sumPaguTenderSeleksi',
            'sumPaguEpurchasing',
            'sumTotalRealisasi',
            'sumNilaiPdnPct',
            'sumNilaiUmkPct',
            'formattedUpdatedAt',
            'sumPaguEpurchasingProses',
            'formattedEpurchasingUpdatedAt',
            'sumPaguPdnNonTender',
            'countPdn',
            'sumPaguPdn',
            'countPdnTercatat',
            'countUkm',
            'sumPaguUkm',
            'sumPaguUkmNonTender',
            'countUkmTercatat'
        ));
        
    }
}