@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-yellow-500 mb-6">Buat Jadwal Baru</h2>
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-400 mb-2">Mata Kuliah</label>
            <select name="subject_id" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white" required>
                @foreach($subjects as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-400 mb-2">Kelas</label>
            <select name="class_room_id" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white" required>
                @foreach($classes as $c) <option value="{{ $c->id }}">{{ $c->name }}</option> @endforeach
            </select>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-gray-400 mb-2">Hari</label>
                <select name="day" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white">
                    <option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jumat</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-400 mb-2">Mulai</label>
                <input type="time" name="start_time" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white" required>
            </div>
            <div>
                <label class="block text-gray-400 mb-2">Selesai</label>
                <input type="time" name="end_time" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white" required>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('schedules.index') }}" class="px-4 py-2 bg-gray-600 rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 font-semibold rounded shadow">Simpan Jadwal</button>
        </div>
    </form>
</div>
@endsection