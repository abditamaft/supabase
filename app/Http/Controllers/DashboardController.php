<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\ClassRoom;
use App\Models\Subject;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data untuk ringkasan di atas
        $totalMahasiswa = Biodata::count();
        $totalKelas = ClassRoom::count();
        $totalMataKuliah = Subject::count();

        // Mengambil data statistik absensi untuk grafik Chart.js
        $statHadir = Attendance::where('status', 'hadir')->count();
        $statIzin = Attendance::where('status', 'izin')->count();
        $statSakit = Attendance::where('status', 'sakit')->count();
        $statAlpa = Attendance::where('status', 'alpa')->count();

        return view('dashboard.index', compact(
            'totalMahasiswa', 'totalKelas', 'totalMataKuliah',
            'statHadir', 'statIzin', 'statSakit', 'statAlpa'
        ));
    }
}