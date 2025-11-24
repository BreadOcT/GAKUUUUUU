@extends('layout')
@section('content')
    <h2 class="text-xl font-bold mb-4">Pilih Tentor Tersedia</h2>
    <form action="{{ route('bookings.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label>Pilih Tentor:</label>
            <select name="tentor_id" class="w-full border p-2 rounded">
                @foreach($tentors as $tentor)
                    <option value="{{ $tentor->id }}">{{ $tentor->nama_tentor }} - {{ $tentor->mata_pelajaran }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label>Tanggal Bimbingan:</label>
            <input type="date" name="tanggal_bimbingan" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Catatan Materi:</label>
            <textarea name="catatan_tambahan" class="w-full border p-2 rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Pilihan</button>
    </form>
@endsection
