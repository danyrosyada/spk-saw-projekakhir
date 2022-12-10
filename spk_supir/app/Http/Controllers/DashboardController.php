<?php

namespace App\Http\Controllers;

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

        $data = [
            'users' => $users,
            'periode' => $periode,
            'supir' => $supir,
        ];
        return view('dashboard.index', $data);
    }
}
