<?php

// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Tentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // READ: Melihat daftar tentor yang dipilih & History
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('tentor')->get();
        return view('bookings.index', compact('bookings'));
    }

    // CREATE (View): Form Memilih Tentor (Melihat daftar tersedia)
    public function create()
    {
        $tentors = Tentor::all(); // Tampilkan semua tentor tersedia
        return view('bookings.create', compact('tentors'));
    }

    // CREATE (Action): Simpan Pilihan
    public function store(Request $request)
    {
        $request->validate([
            'tentor_id' => 'required',
            'tanggal_bimbingan' => 'required|date',
            'catatan_tambahan' => 'nullable|string'
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'tentor_id' => $request->tentor_id,
            'tanggal_bimbingan' => $request->tanggal_bimbingan,
            'catatan_tambahan' => $request->catatan_tambahan
        ]);

        return redirect()->route('bookings.index')->with('success', 'Tentor berhasil dipilih!');
    }

    // UPDATE (View): Edit data pilihan
    public function edit(Booking $booking)
    {
        // Pastikan hanya pemilik yang bisa edit
        if($booking->user_id !== Auth::id()) abort(403);
        
        $tentors = Tentor::all();
        return view('bookings.edit', compact('booking', 'tentors'));
    }

    // UPDATE (Action): Simpan perubahan
    public function update(Request $request, Booking $booking)
    {
        if($booking->user_id !== Auth::id()) abort(403);

        $booking->update($request->only(['tentor_id', 'tanggal_bimbingan', 'catatan_tambahan']));
        
        return redirect()->route('bookings.index')->with('success', 'Pilihan berhasil diubah');
    }

    // DELETE: Menghapus data pilihan (Batal)
    public function destroy(Booking $booking)
    {
        if($booking->user_id !== Auth::id()) abort(403);
        
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Pemesanan dibatalkan');
    }
}

