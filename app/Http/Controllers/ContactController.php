<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Tampilkan data kontak (karena hanya 1 data, pakai first).
     */
    public function index()
    {
        $contact = Contact::first();
        return view('backend.page_setting.contact.index', compact('contact'));
    }

    /**
     * Tampilkan form edit.
     */
    public function edit()
    {
        $contact = Contact::first();
        return view('backend.page_setting.contact.edit', compact('contact'));
    }

    /**
     * Simpan data kontak (akan update jika sudah ada).
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'address'   => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'email'     => 'required|email|max:100',
            'latitude'  => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        // Gunakan updateOrCreate agar lebih clean
        Contact::updateOrCreate(
            ['id' => optional(Contact::first())->id], // pakai id jika ada, jika tidak maka akan insert baru
            $validated
        );

        return redirect()->route('backend.contact.index')->with('success', 'Kontak berhasil diperbarui!');
    }
}
