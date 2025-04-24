<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\player;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalPlayers = player::count();
        $lolosSeleksi = \App\Models\player::where('prediction_status', 'Layak')->count();
        $averageKD = player::avg('kd');
        $totalAdmin = User::count();
        return view('pages.dashboard.index', compact('user', 'totalAdmin', 'totalPlayers', 'lolosSeleksi', 'averageKD'));
    }
}
