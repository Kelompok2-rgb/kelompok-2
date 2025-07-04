<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyelenggaraEvent;
use Illuminate\Support\Facades\Auth;

class PenyelenggaraEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $penyelenggara_events = PenyelenggaraEvent::orderBy('created_at', 'desc')->get();
        } else {
            $penyelenggara_events = PenyelenggaraEvent::where('user_id', $user->id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        }

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
            'kontak' => 'required|digits_between:8,15',
        ]);

        $validated['user_id'] = Auth::id();

        PenyelenggaraEvent::create($validated);

        return redirect()->route('backend.penyelenggara_event.index')
            ->with('success', 'Penyelenggara Event berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penyelenggara_event = PenyelenggaraEvent::findOrFail($id);
        $this->authorizeEvent($penyelenggara_event);

        return view('backend.penyelenggara_event.edit', compact('penyelenggara_event'));
    }

    public function update(Request $request, $id)
    {
        $penyelenggara_event = PenyelenggaraEvent::findOrFail($id);
        $this->authorizeEvent($penyelenggara_event);

        $validated = $request->validate([
            'nama_penyelenggara_event' => 'required|string|max:255',
            'kontak' => 'required|digits_between:8,15',
        ]);

        $penyelenggara_event->update($validated);

        return redirect()->route('backend.penyelenggara_event.index')
            ->with('success', 'Penyelenggara Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penyelenggara_event = PenyelenggaraEvent::findOrFail($id);
        $this->authorizeEvent($penyelenggara_event);

        $penyelenggara_event->delete();

        return redirect()->route('backend.penyelenggara_event.index')
            ->with('success', 'Penyelenggara Event berhasil dihapus.');
    }

    // ===== Helper untuk izin =====
    private function authorizeEvent(PenyelenggaraEvent $event)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return;
        }

        if ($event->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}
