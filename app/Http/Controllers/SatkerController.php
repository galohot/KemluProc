<?php

namespace App\Http\Controllers;

use App\Models\RupMasterSatker;
use App\Models\PaketPenyediaTerumumkan;
use App\Models\PaketSwakelolaTerumumkan;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    public function show($kd_satker_str) {
        $rupMasterSatker = RupMasterSatker::with([
            'programMasters.kegiatans.rupKros.rupRos.komponens.subkomponens',
            'paketPenyediaTerumumkans.pencatatanNonTender',
        ])->where('kd_satker_str', $kd_satker_str)->first();
    
        // Count paketPenyediaTerumumkans where metode_pengadaan is 'tender'
        $countTender = $rupMasterSatker->paketPenyediaTerumumkans->where('metode_pengadaan', 'Tender')->count();
    
        // Count paketPenyediaTerumumkans where metode_pengadaan is not 'tender'
        $countNotTender = $rupMasterSatker->paketPenyediaTerumumkans->whereNotIn('metode_pengadaan', ['Tender'])->count();
    
        $totalPaguProgram = $rupMasterSatker->programMasters->sum('pagu_program');
    
        return view('satker.index', compact('rupMasterSatker', 'totalPaguProgram', 'countTender', 'countNotTender'));
    }
    
}