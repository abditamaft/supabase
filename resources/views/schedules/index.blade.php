@extends('layouts.main')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-yellow-500">Jadwal Kuliah</h1>
        <a href="{{ route('schedules.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-lg transition">
            + Tambah Jadwal
        </a>
    </div>

    <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    <th class="p-4">Mata Kuliah</th>
                    <th class="p-4">Kelas</th>
                    <th class="p-4">Hari</th>
                    <th class="p-4">Jam</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $item)
                <tr class="border-b border-gray-700 hover:bg-gray-750">
                    <td class="p-4">
                        <div class="font-bold text-white">{{ $item->subject->name }}</div>
                        <div class="text-xs text-blue-400">{{ $item->subject->code }}</div>
                    </td>
                    <td class="p-4 text-gray-300">{{ $item->classRoom->name }}</td>
                    <td class="p-4 text-gray-300">{{ $item->day }}</td>
                    <td class="p-4 text-gray-300 font-mono">{{ $item->start_time }} - {{ $item->end_time }}</td>
                    <td class="p-4 text-center">
                        <a href="{{ route('schedules.edit', $item->id) }}" class="text-yellow-400 hover:underline mr-3">Edit</a>
                        <form action="{{ route('schedules.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection