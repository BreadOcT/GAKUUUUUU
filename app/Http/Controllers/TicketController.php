<?php

// app/Http/Controllers/TicketController.php
namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // READ: Membaca balasan admin & list pesan
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    // CREATE: Form lapor
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate(['subjek' => 'required', 'pesan' => 'required']);
        
        Ticket::create([
            'user_id' => Auth::id(),
            'subjek' => $request->subjek,
            'pesan' => $request->pesan
        ]);

        return redirect()->route('tickets.index')->with('success', 'Pesan terkirim ke CS');
    }

    // UPDATE: Edit pesan (Hanya jika belum dibalas admin)
    public function edit(Ticket $ticket)
    {
        if($ticket->user_id !== Auth::id()) abort(403);
        if($ticket->status !== 'terkirim') return back()->with('error', 'Pesan sudah dibalas, tidak bisa diedit.');

        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        if($ticket->user_id !== Auth::id()) abort(403);
        
        $ticket->update($request->only(['subjek', 'pesan']));
        return redirect()->route('tickets.index')->with('success', 'Pesan diperbarui');
    }

    // DELETE: Hapus msg
    public function destroy(Ticket $ticket)
    {
        if($ticket->user_id !== Auth::id()) abort(403);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Pesan dihapus');
    }
}

