@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-yellow-500">Data Kelas</h1>
        <a href="{{ route('class_rooms.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-lg transition">
            + Tambah Kelas
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-700 border-b border-gray-600 text-gray-300">
                    <th class="p-4 w-20">ID</th>
                    <th class="p-4">Nama Kelas</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classes as $class)
                    <tr class="border-b border-gray-700 hover:bg-gray-750 transition">
                        <td class="p-4 text-gray-400 font-mono">{{ $class->id }}</td>
                        <td class="p-4 font-semibold text-white">{{ $class->name }}</td>
                        <td class="p-4 text-center">
                            <a href="{{ route('class_rooms.edit', $class->id) }}" class="text-yellow-400 hover:text-yellow-300 mr-3">Edit</a>
                            <form action="{{ route('class_rooms.destroy', $class->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Yakin ingin menghapus kelas ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-6 text-center text-gray-500">Belum ada data kelas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection