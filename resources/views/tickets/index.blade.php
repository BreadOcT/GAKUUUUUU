@extends('layout')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Riwayat Laporan CS</h2>
        <a href="{{ route('tickets.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Lapor Masalah</a>
    </div>

    @foreach($tickets as $ticket)
        <div class="bg-white p-4 rounded shadow mb-3">
            <div class="flex justify-between">
                <h3 class="font-bold">{{ $ticket->subjek }}</h3>
                <span class="text-xs px-2 py-1 rounded {{ $ticket->status == 'dibalas' ? 'bg-green-200' : 'bg-gray-200' }}">
                    {{ ucfirst($ticket->status) }}
                </span>
            </div>
            <p class="mt-2 text-gray-800">Q: {{ $ticket->pesan }}</p>
            
            @if($ticket->balasan_admin)
                <div class="mt-3 bg-blue-50 p-3 rounded border border-blue-100">
                    <p class="font-bold text-blue-800 text-sm">Admin:</p>
                    <p class="text-gray-700">{{ $ticket->balasan_admin }}</p>
                </div>
            @else
                <p class="text-xs text-gray-400 mt-2 italic">Menunggu balasan admin...</p>
                <div class="mt-2 flex gap-2 text-sm">
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="text-yellow-600 hover:underline">Edit Pesan</a>
                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
@endsection
