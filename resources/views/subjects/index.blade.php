@extends('layouts.main')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-yellow-500">Mata Kuliah</h1>
        <a href="{{ route('subjects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-lg transition">
            + Tambah Mata Kuliah
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-700 border-b border-gray-600 text-gray-300">
                    <th class="p-4 w-32">Kode MK</th>
                    <th class="p-4">Nama Mata Kuliah</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subjects as $subject)
                    <tr class="border-b border-gray-700 hover:bg-gray-750 transition">
                        <td class="p-4 text-blue-400 font-mono font-bold">{{ $subject->code }}</td>
                        <td class="p-4 font-semibold text-white">{{ $subject->name }}</td>
                        <td class="p-4 text-center">
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="text-yellow-400 hover:text-yellow-300 mr-3">Edit</a>
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-6 text-center text-gray-500">Belum ada data mata kuliah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection