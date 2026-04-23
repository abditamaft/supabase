<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-Akademik PSDKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-900 text-gray-200 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col">
        <div class="h-16 flex items-center justify-center border-b border-gray-700">
            <h1 class="text-xl font-bold text-yellow-500">SI-Akademik</h1>
        </div>
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-400 hover:bg-gray-700 hover:text-white transition' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('biodatas.index') }}" class="block px-4 py-2 rounded {{ request()->routeIs('biodatas.*') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-400 hover:bg-gray-700 hover:text-white transition' }}">
                🎓 Data Mahasiswa
            </a>
            
            <div class="pt-4 pb-2">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Manajemen Akademik</p>
            </div>
            
            <a href="{{ route('class_rooms.index') }}" class="block px-4 py-2 rounded text-gray-400 hover:bg-gray-700 hover:text-white transition">
                🏫 Data Kelas
            </a>
            <a href="{{ route('subjects.index') }}" class="block px-4 py-2 rounded text-gray-400 hover:bg-gray-700 hover:text-white transition">
                📚 Mata Kuliah
            </a>
            <a href="{{ route('schedules.index') }}" class="block px-4 py-2 rounded text-gray-400 hover:bg-gray-700 hover:text-white transition">
                📅 Jadwal Kuliah
            </a>
        </nav>
    </aside>

    <main class="flex-1 overflow-y-auto p-8 bg-gray-900">
        @yield('content')
    </main>

</body>
</html>