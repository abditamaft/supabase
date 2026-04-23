@extends('layouts.main')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-white">Dashboard Analisis</h2>
    <div class="text-gray-400">Selamat datang, Admin</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border-l-4 border-blue-500">
        <div class="text-gray-400 text-sm font-semibold uppercase">Total Mahasiswa</div>
        <div class="text-3xl font-bold text-white mt-2">{{ $totalMahasiswa }}</div>
    </div>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border-l-4 border-green-500">
        <div class="text-gray-400 text-sm font-semibold uppercase">Total Kelas</div>
        <div class="text-3xl font-bold text-white mt-2">{{ $totalKelas }}</div>
    </div>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border-l-4 border-yellow-500">
        <div class="text-gray-400 text-sm font-semibold uppercase">Total Mata Kuliah</div>
        <div class="text-3xl font-bold text-white mt-2">{{ $totalMataKuliah }}</div>
    </div>
</div>

<div class="bg-gray-800 p-6 rounded-lg shadow-lg">
    <h3 class="text-xl font-semibold text-white mb-4">Statistik Kehadiran Mahasiswa</h3>
    <div class="w-full h-80 flex justify-center">
        <canvas id="attendanceChart"></canvas>
    </div>
</div>

<script>
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Hadir', 'Izin', 'Sakit', 'Alpa'],
            datasets: [{
                data: [{{ $statHadir }}, {{ $statIzin }}, {{ $statSakit }}, {{ $statAlpa }}],
                backgroundColor: ['#22c55e', '#3b82f6', '#eab308', '#ef4444'],
                borderWidth: 0
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { labels: { color: '#e5e7eb' } } } }
    });
</script>
@endsection