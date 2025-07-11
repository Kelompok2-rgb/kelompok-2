<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyelenggaraEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PenyelenggaraEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $penyelenggaraEvents = $user->role === 'admin'
            ? PenyelenggaraEvent::latest()->get()
            : PenyelenggaraEvent::where('user_id', $user->id)->latest()->get();

        return view('backend.penyelenggara_event.index', compact('penyelenggaraEvents', 'user'));
    }

    public function create()
    {
        return view('backend.penyelenggara_event.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateEvent($request);
        $validatedData['user_id'] = Auth::id();

        PenyelenggaraEvent::create($validatedData);

        return redirect()
            ->route('backend.penyelenggara_event.index')
            ->with('success', 'Penyelenggara Event berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penyelenggaraEvent = PenyelenggaraEvent::findOrFail($id);

        $this->authorizeEvent($penyelenggaraEvent);

        return view('backend.penyelenggara_event.edit', compact('penyelenggaraEvent'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $penyelenggaraEvent = PenyelenggaraEvent::findOrFail($id);

        $this->authorizeEvent($penyelenggaraEvent);

        $validatedData = $this->validateEvent($request);

        $penyelenggaraEvent->update($validatedData);

        return redirect()
            ->route('backend.penyelenggara_event.index')
            ->with('success', 'Penyelenggara Event berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        $penyelenggaraEvent = PenyelenggaraEvent::findOrFail($id);

        $this->authorizeEvent($penyelenggaraEvent);

        $penyelenggaraEvent->delete();

        return redirect()
            ->route('backend.penyelenggara_event.index')
            ->with('success', 'Penyelenggara Event berhasil dihapus.');
    }

    // ===== Helper Methods =====

    private function validateEvent(Request $request): array
    {
        return $request->validate([
            'nama_penyelenggara_event' => 'required|string|max:255',
            'kontak'                   => 'required|digits_between:8,15',
        ]);
    }

    private function authorizeEvent(PenyelenggaraEvent $event): void
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
