<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ClassRoom;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Eager loading agar tidak berat saat mengambil data relasi
        $schedules = Schedule::with(['classRoom', 'subject'])->latest()->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $classes = ClassRoom::all();
        $subjects = Subject::all();
        return view('schedules.create', compact('classes', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'class_room_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dibuat!');
    }

    public function edit(Schedule $schedule)
    {
        $classes = ClassRoom::all();
        $subjects = Subject::all();
        return view('schedules.edit', compact('schedule', 'classes', 'subjects'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->all());
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diupdate!');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}