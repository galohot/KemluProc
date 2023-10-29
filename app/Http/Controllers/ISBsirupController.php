<?php

namespace App\Http\Controllers;

use App\Models\ProgramMaster;
use Illuminate\Http\Request;

class ISBsirupController extends Controller
{
    public function show($id) {
        $sirup = ProgramMaster::with('kegiatans.rupKros.rupRos.komponens.subkomponens')->find($id);
    
        return view('sirup.index', compact('sirup'));
    }
}
