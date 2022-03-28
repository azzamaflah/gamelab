<?php

namespace App\Http\Controllers;

use App\Data;
use App\Jurusan;
use App\MataPelajaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalsiswa = Data::all()->count();
        $totaljurusan = Jurusan::all()->count();
        $totalmapel = MataPelajaran::all()->count();
        return view('dashboard', compact('totalsiswa', 'totaljurusan', 'totalmapel'));
    }
}
