<?php

namespace App\Http\Controllers;

use App\Models\RupMasterSatker;
use Illuminate\Http\Request;

class ISBsirupController extends Controller
{
    public function show($kd_satker) {
        $rupMasterSatker = RupMasterSatker::with('programMasters.kegiatans.rupKros.rupRos.komponens.subkomponens')->where('kd_satker', $kd_satker)->first();
        
        // Calculate the total sum of 'pagu_program'
        $totalPaguProgram = $rupMasterSatker->programMasters->sum('pagu_program');

        return view('sirup.index', compact('rupMasterSatker', 'totalPaguProgram'));
    }
}
