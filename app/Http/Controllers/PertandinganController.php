<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;
use App\Models\PenyelenggaraEvent;
use App\Models\Juri;
use Illuminate\Support\Facades\Auth;

class PertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $pertandingans = Pertandingan::with(['penyelenggaraEvent', 'juri'])->latest()->get();
        } else {
            $pertandingans = Pertandingan::whereHas('penyelenggaraEvent', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->with(['penyelenggaraEvent', 'juri'])
                ->latest()
                ->get();
        }

        return view('backend.pertandingan.index', compact('pertandingans'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        } else {
            $penyelenggaras = PenyelenggaraEvent::where('user_id', $user->id)->orderBy('nama_penyelenggara_event')->get();
        }

        $juris = Juri::orderBy('nama_juri')->get();

        return view('backend.pertandingan.create', compact('penyelenggaras', 'juris'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePertandingan($request);

        $user = Auth::user();

        if ($user->role !== 'admin') {
            // Pastikan penyelenggara yg dipilih benar-benar milik user ini
            $penyelenggara = PenyelenggaraEvent::where('id', $validated['penyelenggara_event_id'])
                ->where('user_id', $user->id)
                ->first();

            if (!$penyelenggara) {
                abort(403, 'Anda tidak memiliki izin untuk menggunakan penyelenggara ini.');
            }
        }

        // Jika di tabel pertandingan ada `user_id`, masukkan otomatis
        $validated['user_id'] = $user->id;

        Pertandingan::create($validated);

        return redirect()->route('backend.pertandingan.index')
            ->with('success', 'Pertandingan berhasil ditambahkan.');
    }

    public function edit(Pertandingan $pertandingan)
    {
        $this->authorizePenyelenggara($pertandingan);

        $user = Auth::user();
        if ($user->role === 'admin') {
            $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        } else {
            $penyelenggaras = PenyelenggaraEvent::where('user_id', $user->id)->orderBy('nama_penyelenggara_event')->get();
        }

        $juris = Juri::orderBy('nama_juri')->get();

        return view('backend.pertandingan.edit', compact('pertandingan', 'penyelenggaras', 'juris'));
    }

    public function update(Request $request, Pertandingan $pertandingan)
    {
        $this->authorizePenyelenggara($pertandingan);

        $validated = $this->validatePertandingan($request);

        // Non admin harus cek apakah penyelenggara yang diupdate miliknya
        $user = Auth::user();
        if ($user->role !== 'admin') {
            $penyelenggara = PenyelenggaraEvent::where('id', $validated['penyelenggara_event_id'])
                ->where('user_id', $user->id)
                ->first();

            if (!$penyelenggara) {
                abort(403, 'Anda tidak memiliki izin untuk memilih penyelenggara ini.');
            }
        }

        $pertandingan->update($validated);

        return redirect()->route('backend.pertandingan.index')
            ->with('success', 'Pertandingan berhasil diperbarui.');
    }

    public function destroy(Pertandingan $pertandingan)
    {
        $this->authorizePenyelenggara($pertandingan);

        $pertandingan->delete();

        return redirect()->route('backend.pertandingan.index')
            ->with('success', 'Pertandingan berhasil dihapus.');
    }

    // ===== Helper Methods =====

    private function validatePertandingan(Request $request): array
    {
        return $request->validate([
            'nama_pertandingan'      => 'required|string|min:2|max:255',
            'penyelenggara_event_id' => 'required|exists:penyelenggara_events,id',
            'juri_id'                => 'required|exists:juris,id',
        ]);
    }

    private function authorizePenyelenggara(Pertandingan $pertandingan): void
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return;
        }

        if (!$pertandingan->penyelenggaraEvent || $pertandingan->penyelenggaraEvent->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}
