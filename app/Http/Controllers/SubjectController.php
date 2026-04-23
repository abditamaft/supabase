<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::latest()->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        // Validasi unik pada kode mata kuliah agar tidak ada yang dobel
        $request->validate([
            'code' => 'required|string|max:50|unique:subjects',
            'name' => 'required|string|max:255'
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:subjects,code,' . $subject->id,
            'name' => 'required|string|max:255'
        ]);

        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Mata Kuliah berhasil diperbarui!');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Mata Kuliah berhasil dihapus!');
    }
}