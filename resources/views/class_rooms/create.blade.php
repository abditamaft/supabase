@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg mt-4">
    <h2 class="text-2xl font-bold text-yellow-500 mb-6">Tambah Kelas Baru</h2>
    
    <form action="{{ route('class_rooms.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label class="block text-gray-400 mb-2">Nama Kelas (Contoh: TIF Sidoarjo 2A)</label>
            <input type="text" name="name" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-blue-500" placeholder="Masukkan nama kelas..." required>
        </div>
        
        <div class="flex justify-end gap-3">
            <a href="{{ route('class_rooms.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 rounded transition">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 font-semibold rounded shadow transition">Simpan Kelas</button>
        </div>
    </form>
</div>
@endsection