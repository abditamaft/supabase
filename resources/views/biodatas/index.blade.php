@extends('layouts.main')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-yellow-500">Data Mahasiswa</h1>
        <a href="{{ route('biodatas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-lg transition">
            + Tambah Biodata
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-700 border-b border-gray-600 text-gray-300">
                    <th class="p-4">Foto</th>
                    <th class="p-4">NIM</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Jurusan</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($biodatas as $item)
                    <tr class="border-b border-gray-700 hover:bg-gray-750 transition">
                        <td class="p-4">
                            @if($item->profile_photo)
                                <img src="{{ asset('storage/' . $item->profile_photo) }}" alt="Foto" class="w-12 h-12 rounded-full object-cover border-2 border-yellow-500">
                            @else
                                <div class="w-12 h-12 rounded-full bg-gray-600 flex items-center justify-center border-2 border-gray-500 text-xs">No Pic</div>
                            @endif
                        </td>
                        <td class="p-4 font-mono text-blue-400">{{ $item->nim }}</td>
                        <td class="p-4 font-semibold">{{ $item->name }}</td>
                        <td class="p-4"><span class="bg-gray-700 px-2 py-1 rounded text-sm">{{ $item->department->name ?? '-' }}</span></td>
                        <td class="p-4 text-center">
                            <a href="{{ route('biodatas.edit', $item->id) }}" class="text-yellow-400 hover:text-yellow-300 mr-3">Edit</a>
                            <form action="{{ route('biodatas.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">Belum ada data biodata.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection