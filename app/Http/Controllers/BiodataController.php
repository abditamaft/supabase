<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::with('department')->latest()->get();
        return view('biodatas.index', compact('biodatas'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('biodatas.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:biodatas',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        Biodata::create($data);
        return redirect()->route('biodatas.index')->with('success', 'Biodata berhasil ditambahkan!');
    }

    public function edit(Biodata $biodata)
    {
        $departments = Department::all();
        return view('biodatas.edit', compact('biodata', 'departments'));
    }

    public function update(Request $request, Biodata $biodata)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:biodatas,nim,' . $biodata->id,
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($biodata->profile_photo) {
                Storage::disk('public')->delete($biodata->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        $biodata->update($data);
        return redirect()->route('biodatas.index')->with('success', 'Biodata berhasil diupdate!');
    }

    public function destroy(Biodata $biodata)
    {
        if ($biodata->profile_photo) {
            Storage::disk('public')->delete($biodata->profile_photo);
        }
        $biodata->delete();
        return redirect()->route('biodatas.index')->with('success', 'Biodata berhasil dihapus!');
    }
}
