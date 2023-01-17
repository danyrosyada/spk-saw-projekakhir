<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Periode;
use App\Models\Supir;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $periode = Periode::all()->count();
        $supir = Supir::all()->count();
        $kriteria = Kriteria::all()->count();

        $data = [
            'title'=> 'Dashboard',
            'users' => $users,
            'periode' => $periode,
            'supir' => $supir,
            'kriteria' => $kriteria,
        ];
        return view('dashboard.index', $data);
    }
}
