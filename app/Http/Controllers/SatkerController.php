<?php

namespace App\Http\Controllers;

use App\Models\EcatPaketEpurchasing;
use App\Models\RupMasterSatker;
use App\Models\PaketPenyediaTerumumkan;
use App\Models\PaketSwakelolaTerumumkan;
use App\Models\SpsePencatatanNonTender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatkerController extends Controller
{
    public function show($tahun_anggaran, $kd_satker_str)
    {
        
        $rupMasterSatker = RupMasterSatker::with([
            'programMasters' => function ($query) use ($tahun_anggaran) {
                $query->where('tahun_anggaran', $tahun_anggaran);
            },
            'programMasters.kegiatans.rupKros.rupRos.komponens.subkomponens',
            'paketPenyediaTerumumkans' => function ($query) use ($tahun_anggaran) {
                $query->where('tahun_anggaran', $tahun_anggaran);
            },
            'paketPenyediaTerumumkans.pencatatanNonTender.realisasiNonTenders'=> function ($query) use ($tahun_anggaran) {
                $query->where('tahun_anggaran', $tahun_anggaran);
            },
            'paketPenyediaTerumumkans.tenderSelesai.tenderSelesaiNilais'=> function ($query) use ($tahun_anggaran) {
                $query->where('tahun_anggaran', $tahun_anggaran);
            },
            'paketPenyediaTerumumkans.paketEcats'=> function ($query) use ($tahun_anggaran) {
                $query->where('tahun_anggaran', $tahun_anggaran);
            },
            'paketPenyediaTerumumkans.paketEcats.epurchasingProduct',
            'paketPenyediaTerumumkans.paketEcats.epurchasingPenyedia',
            'paketPenyediaTerumumkans.paketEcats.epurchasingKomoditas',
            'paketPenyediaTerumumkans.paketEcats.epurchasingDistributor',
            'paketPenyediaTerumumkans.paketEcats.epurchasingUserPokja',
            'paketPenyediaTerumumkans.paketEcats.epurchasingUserPpk',
            'paketSwakelolaTerumumkans' => function ($query) use ($tahun_anggaran) {
                $query->where('tahun_anggaran', $tahun_anggaran);
            },
        ])
        ->where('kd_satker_str', $kd_satker_str)
        ->first();
    
    
        
        $tahunAnggaran = PaketPenyediaTerumumkan::where('tahun_anggaran', $tahun_anggaran)->value('tahun_anggaran');


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
        ->where('tahun_anggaran', $tahun_anggaran)
        ->count();
        
        $sumPaguTenderSeleksi = $rupMasterSatker->paketPenyediaTerumumkans
        ->whereIn('metode_pengadaan', ['Tender', 'Seleksi'])
        ->where('tahun_anggaran', $tahun_anggaran)
        ->sum('pagu');
        
        
        $countEpurchasing = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'e-Purchasing')->where('tahun_anggaran', $tahun_anggaran)->where('kd_satker_str', $kd_satker_str)->count();

        
        $sumPaguEpurchasing = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'e-Purchasing')->where('tahun_anggaran', $tahun_anggaran)->sum('pagu');

        $countPdn = $rupMasterSatker->paketPenyediaTerumumkans->where('status_pdn', 'PDN')->where('tahun_anggaran', $tahun_anggaran)->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])->count();
        $sumPaguPdn = $rupMasterSatker->paketPenyediaTerumumkans->where('status_pdn', 'PDN')->where('tahun_anggaran', $tahun_anggaran)->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])->sum('pagu');
        
        $countUkm = $rupMasterSatker->paketPenyediaTerumumkans->where('status_ukm', 'UKM')->where('tahun_anggaran', $tahun_anggaran)->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])->count();
        $sumPaguUkm = $rupMasterSatker->paketPenyediaTerumumkans->where('status_ukm', 'UKM')->where('tahun_anggaran', $tahun_anggaran)->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])->sum('pagu');
        
        $countPaketPenyedia = $rupMasterSatker->paketPenyediaTerumumkans->where('tahun_anggaran', $tahun_anggaran)->count();
        
        $countPaketNontenderDetails = DB::table('paket_penyedia_terumumkan')
        ->where('tahun_anggaran', $tahun_anggaran)
        ->where('kd_satker_str', $kd_satker_str)
        ->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])
        ->groupBy('metode_pengadaan')
        ->selectRaw('metode_pengadaan, count(*) as count, sum(pagu) as sum_pagu')
        ->get();
        
        
        $countPaketTenderDetails = DB::table('paket_penyedia_terumumkan')
        ->where('tahun_anggaran', $tahun_anggaran)
        ->where('kd_satker_str', $kd_satker_str)
        ->whereIn('metode_pengadaan', ['Tender', 'Seleksi'])
        ->groupBy('metode_pengadaan')
        ->selectRaw('metode_pengadaan, count(*) as count, sum(pagu) as sum_pagu')
        ->get();
        
        $countPaketEpurchasingDetails = DB::table('paket_penyedia_terumumkan')
        ->where('tahun_anggaran', $tahun_anggaran)
        ->where('kd_satker_str', $kd_satker_str)
        ->whereIn('metode_pengadaan', ['e-Purchasing'])
        ->groupBy('metode_pengadaan')
        ->selectRaw('metode_pengadaan, count(*) as count, sum(pagu) as sum_pagu')
        ->get();
        

        
        $countPaketSwakelola = $rupMasterSatker->paketSwakelolaTerumumkans->where('tahun_anggaran', $tahun_anggaran)->count();
        $sumPaguPenyediaTerumumkan = $rupMasterSatker->paketPenyediaTerumumkans->where('tahun_anggaran', $tahun_anggaran)->sum('pagu');
        $sumPaguSwakelolaTerumumkan = $rupMasterSatker->paketSwakelolaTerumumkans->where('tahun_anggaran', $tahun_anggaran)->sum('pagu');


        // Count paketPenyediaTerumumkans where metode_pengadaan is not 'tender'
        $sumPaguNonTender = $rupMasterSatker->paketPenyediaTerumumkans->whereNotIn('metode_pengadaan', ['Tender','Seleksi','e-Purchasing'])->where('tahun_anggaran', $tahun_anggaran)->where('kd_satker_str', $kd_satker_str)->sum('pagu');

        $totalPaguProgram = $rupMasterSatker->programMasters->where('tahun_anggaran', $tahun_anggaran)->sum('pagu_program');

        // Perform the inner join and get the distinct kd_rup values
        $kdRupTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('spse_pencatatan_nontender.tahun_anggaran', $tahun_anggaran)
            ->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])
            ->distinct()
            ->pluck('paket_penyedia_terumumkan.kd_rup')
            ->toArray();
            
        $kdRupTercatatNonTender = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('spse_pencatatan_nontender.tahun_anggaran', $tahun_anggaran)
            ->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])
            ->groupBy('metode_pengadaan')
            ->selectRaw('metode_pengadaan, count(*) as count, sum(paket_penyedia_terumumkan.pagu) as sum_pagu') // Specify the table alias for pagu
            ->get();


        $pdnTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('spse_pencatatan_nontender.tahun_anggaran', $tahun_anggaran)
            ->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])
            ->where(function($query) {
                $query->whereNotNull('spse_pencatatan_nontender.nilai_pdn_pct')
                      ->where('spse_pencatatan_nontender.nilai_pdn_pct', '!=', 0);
            })
            ->groupBy('metode_pengadaan')
            ->selectRaw('metode_pengadaan, count(*) as count, sum(spse_pencatatan_nontender.nilai_pdn_pct) as sum_pagu')
            ->get();
        
            
        $ukmTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('spse_pencatatan_nontender.tahun_anggaran', $tahun_anggaran)
            ->whereNotIn('metode_pengadaan', ['Tender', 'Seleksi', 'e-Purchasing'])
            ->where(function($query) {
                $query->whereNotNull('spse_pencatatan_nontender.nilai_umk_pct')
                      ->where('spse_pencatatan_nontender.nilai_umk_pct', '!=', 0);
            })
            ->groupBy('metode_pengadaan')
            ->selectRaw('metode_pengadaan, count(*) as count, sum(spse_pencatatan_nontender.nilai_umk_pct) as sum_pagu')
            ->get();
            
        $epurchasingProses = PaketPenyediaTerumumkan::join(
                'ecat_paket_epurchasing',
                function ($join) {
                    $join->on('paket_penyedia_terumumkan.kd_rup', '=', 'ecat_paket_epurchasing.kd_rup')
                        ->whereRaw('ecat_paket_epurchasing.tanggal_edit_paket = (SELECT MAX(tanggal_edit_paket) FROM ecat_paket_epurchasing WHERE kd_rup = paket_penyedia_terumumkan.kd_rup)');
                }
            )
            ->where('paket_penyedia_terumumkan.kd_satker', $kdSatker)
            ->where('ecat_paket_epurchasing.satker_id', $kdSatker)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('ecat_paket_epurchasing.tahun_anggaran', $tahun_anggaran)
            ->where('metode_pengadaan', 'e-Purchasing')
            ->groupBy('status_paket')
            ->selectRaw('status_paket, count(DISTINCT paket_penyedia_terumumkan.kd_rup) as count, sum(ecat_paket_epurchasing.total_harga) as sum_pagu')
            ->get();
            
        
        $kdRupEpurchasing = PaketPenyediaTerumumkan::join('ecat_paket_epurchasing', 'paket_penyedia_terumumkan.kd_rup', '=', 'ecat_paket_epurchasing.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker', $kdSatker)
            ->where('ecat_paket_epurchasing.satker_id', $kdSatker)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('ecat_paket_epurchasing.tahun_anggaran', $tahun_anggaran)
            ->distinct()
            ->pluck('paket_penyedia_terumumkan.kd_rup')
            ->toArray();

        $countPdnTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('spse_pencatatan_nontender.tahun_anggaran', $tahun_anggaran)
            ->whereNotNull('spse_pencatatan_nontender.nilai_pdn_pct') // Add this line to filter non-null values
            ->distinct()
            ->count('spse_pencatatan_nontender.nilai_pdn_pct');
            
        $countUkmTercatat = PaketPenyediaTerumumkan::join('spse_pencatatan_nontender', 'paket_penyedia_terumumkan.kd_rup', '=', 'spse_pencatatan_nontender.kd_rup')
            ->where('paket_penyedia_terumumkan.kd_satker_str', $kd_satker_str)
            ->where('spse_pencatatan_nontender.kd_satker_str', $kd_satker_str)
            ->where('paket_penyedia_terumumkan.tahun_anggaran', $tahun_anggaran)
            ->where('spse_pencatatan_nontender.tahun_anggaran', $tahun_anggaran)
            ->whereNotNull('spse_pencatatan_nontender.nilai_umk_pct') // Add this line to filter non-null values
            ->distinct()
            ->count('spse_pencatatan_nontender.nilai_umk_pct');
        
        // $kdRupTercatat now holds the count of non-null values in the 'nilai_pdn_pct' field

        $countKdRupTercatat = count($kdRupTercatat);
        $countKdRupEpurchasing = count($kdRupEpurchasing);

        // Sum of 'pagu', 'total_realisasi', 'nilai_pdn_pct', 'nilai_umk_pct' from SpsePencatatanNonTender
        $sumPaguPencatatanNonTender = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->where('tahun_anggaran', $tahun_anggaran)->sum('pagu');
        $sumPaguPdnNonTender = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->where('tahun_anggaran', $tahun_anggaran)->sum('nilai_pdn_pct');
        $sumPaguUkmNonTender = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->where('tahun_anggaran', $tahun_anggaran)->sum('nilai_umk_pct');
        $sumPaguEpurchasingProses = EcatPaketEpurchasing::whereIn('kd_rup', $kdRupEpurchasing)->where('tahun_anggaran', $tahun_anggaran)->sum('total_harga');
        $sumTotalRealisasi = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->where('tahun_anggaran', $tahun_anggaran)->sum('total_realisasi');
        $sumNilaiPdnPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->where('tahun_anggaran', $tahun_anggaran)->sum('nilai_pdn_pct');
        $sumNilaiUmkPct = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->where('tahun_anggaran', $tahun_anggaran)->sum('nilai_umk_pct');
        $nonTenderUpdatedAt = SpsePencatatanNonTender::whereIn('kd_rup', $kdRupTercatat)->where('tahun_anggaran', $tahun_anggaran)->first('updated_at');

        // Retrieve unique tahun_anggaran values from your database
        $tahunAnggaranList = PaketPenyediaTerumumkan::distinct('tahun_anggaran')->pluck('tahun_anggaran')->toArray();

        // Retrieve unique kd_satker_str values along with the corresponding nama_satker values from your database
        $kdSatkerList = RupMasterSatker::select('kd_satker_str', 'nama_satker')->distinct('kd_satker_str')->get();

        // Separate kd_satker_str and nama_satker into two arrays
        $kdSatkerStrList = $kdSatkerList->pluck('kd_satker_str')->toArray();
        $namaSatkerList = $kdSatkerList->pluck('nama_satker')->toArray();

        // Determine the selected values for dropdowns based on the parameters
        $selectedTahunAnggaran = $tahun_anggaran;
        $selectedKdSatkerStr = $kd_satker_str;

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
            'countUkmTercatat',
            'tahunAnggaran',
            'tahunAnggaranList',
            'kdSatkerStrList',
            'namaSatkerList',
            'selectedTahunAnggaran', // Pass the selected tahun_anggaran to the view
            'selectedKdSatkerStr', // Pass the selected kd_satker_str to the view
            'countPaketNontenderDetails',
            'countPaketTenderDetails',
            'countPaketEpurchasingDetails',
            'kdRupTercatatNonTender',
            'pdnTercatat',
            'ukmTercatat',
            'epurchasingProses',
            'kdSatker',
        ));
        
    }
}