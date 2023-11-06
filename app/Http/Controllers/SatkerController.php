<?php

namespace App\Http\Controllers;

use App\Models\RupMasterSatker;
use App\Models\PaketPenyediaTerumumkan;
use App\Models\PaketSwakelolaTerumumkan;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    public function show($kd_satker) {
        $rupMasterSatker = RupMasterSatker::with([
            'programMasters.kegiatans.rupKros.rupRos.komponens.subkomponens',
            'paketPenyediaTerumumkans.tenderPengumumans.pesertaTender',
            'paketPenyediaTerumumkans.tenderPengumumans.jadwalTahapan',
            'paketPenyediaTerumumkans.nonTenderPengumumans.pencatatanNonTender',
            'paketSwakelolaTerumumkans'
        ])->where('kd_satker', $kd_satker)->first();
        -
        // Calculate the total sum of 'pagu_program'
        $totalPaguProgram = $rupMasterSatker->programMasters->sum('pagu_program');

        return view('satker.index', compact('rupMasterSatker', 'totalPaguProgram'));
    }
}