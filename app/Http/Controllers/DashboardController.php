<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalRekam = DB::select('SELECT CountTotalRekamMedis() AS totalRekam')[0]->totalRekam;
        $totalResep = DB::select('SELECT CountTotalResepObat() AS totalResep')[0]->totalResep;
        $totalPendaftaran = DB::select('SELECT CountTotalPendaftaran() AS totalPendaftaran')[0]->totalPendaftaran;
        $totalPasien = DB::select('SELECT CountTotalPasien() AS totalPasien')[0]->totalPasien;
        $data = [
            'jumlahRekam' => $totalRekam,
            'jumlahResep' => $totalResep,
            'jumlahPendaftaran' => $totalPendaftaran,
            'jumlahPasien' => $totalPasien
        ];
        return view('dashboard.index', $data);
    }

}
