@extends('layout')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Jadwal Tentor Saya</h2>
        <a href="{{ route('bookings.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Pilih Tentor Baru</a>
    </div>

    <div class="grid gap-4">
    @foreach($bookings as $booking)
        <div class="bg-white p-4 rounded shadow border-l-4 border-blue-500">
            <h3 class="font-bold text-lg">{{ $booking->tentor->nama_tentor }} ({{ $booking->tentor->mata_pelajaran }})</h3>
            <p>Tanggal: {{ $booking->tanggal_bimbingan }}</p>
            <p class="text-gray-600 text-sm">Catatan: {{ $booking->catatan_tambahan }}</p>
            
            <div class="mt-3 flex gap-2">
                <a href="{{ route('bookings.edit', $booking->id) }}" class="text-yellow-600">Edit Pilihan</a>
                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Batalkan?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600">Batalkan (Delete)</button>
                </form>
            </div>
        </div>
    @endforeach
    </div>
@endsection
