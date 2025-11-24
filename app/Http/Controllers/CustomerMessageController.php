<?php

namespace App\Http\Controllers;

use App\Models\CustomerMessage;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use Illuminate\Http\Request; // <- pastikan ini ada

class CustomerMessageController extends Controller
{
    // Publik: user kirim pesan
    public function store(StoreMessageRequest $request)
    {
        $data = $request->only(['name','email','message']);
        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }
        CustomerMessage::create($data);
        return redirect()->back()->with('success','Pesan terkirim.');
    }

    // Halaman index
    public function index()
    {
        $messages = CustomerMessage::orderBy('id', 'desc')->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    // Halaman show
    public function show(CustomerMessage $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    // Update balasan & status
    public function update(Request $request, CustomerMessage $message)
    {
        $message->update([
            'balasan' => $request->input('balasan'),
            'status' => 'Sudah', // otomatis set ke "Sudah"
        ]);

        return redirect()->route('admin.messages.index')
                         ->with('success', 'Balasan tersimpan, status diperbarui!');
    }

    // Hapus pesan
    public function destroy(CustomerMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Pesan berhasil dihapus!');
    }
}

