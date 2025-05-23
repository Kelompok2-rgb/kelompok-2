<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyelenggaraEvent;

class PenyelenggaraEventController extends Controller
{
    public function index()
    {
        $penyelenggara_events = PenyelenggaraEvent::orderBy('tanggal', 'desc')->get();
    return view('backend.penyelenggara_event.index', compact('penyelenggara_events'));

    }

    public function create()
    {
        return view('backend.penyelenggara_event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penyelenggara_event' => 'required|string|max:255',
            'nama_event'         => 'required|string|max:255',
            'tanggal'            => 'required|date',
            'lokasi'             => 'required|string|max:255',
        ]);

        PenyelenggaraEvent::create($validated);
        return redirect()->route('backend.penyelenggara_event.index')->with('success', 'Event berhasil ditambahkan.');
    }

   public function edit($id)
{
    $penyelenggara_event = PenyelenggaraEvent::findOrFail($id);
    return view('backend.penyelenggara_event.edit', compact('penyelenggara_event'));
}


    public function update(Request $request, $id)
    {
        $event = PenyelenggaraEvent::findOrFail($id);

        $validated = $request->validate([
            'nama_penyelenggara_event' => 'required|string|max:255',
            'nama_event'         => 'required|string|max:255',
            'tanggal'            => 'required|date',
            'lokasi'             => 'required|string|max:255',
        ]);

        $event->update($validated);
        return redirect()->route('backend.penyelenggara_event.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = PenyelenggaraEvent::findOrFail($id);
        $event->delete();
        return redirect()->route('backend.penyelenggara_event.index')->with('success', 'Event berhasil dihapus.');
    }
}
