<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::latest()->get();
        return view('class_rooms.index', compact('classes'));
    }

    public function create()
    {
        return view('class_rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        ClassRoom::create($request->all());
        return redirect()->route('class_rooms.index')->with('success', 'Data Kelas berhasil ditambahkan!');
    }

    public function edit(ClassRoom $classRoom)
    {
        return view('class_rooms.edit', compact('classRoom'));
    }

    public function update(Request $request, ClassRoom $classRoom)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $classRoom->update($request->all());
        return redirect()->route('class_rooms.index')->with('success', 'Data Kelas berhasil diperbarui!');
    }

    public function destroy(ClassRoom $classRoom)
    {
        $classRoom->delete();
        return redirect()->route('class_rooms.index')->with('success', 'Data Kelas berhasil dihapus!');
    }
}