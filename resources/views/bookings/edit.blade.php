@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">✏️ Edit Jadwal Tentor</h2>
        
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Pilih Tentor</label>
                <select name="tentor_id" class="w-full border p-2 rounded bg-gray-50">
                    @foreach($tentors as $tentor)
                        <option value="{{ $tentor->id }}" {{ $booking->tentor_id == $tentor->id ? 'selected' : '' }}>
                            {{ $tentor->nama_tentor }} - {{ $tentor->mata_pelajaran }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Tanggal Bimbingan</label>
                <input type="date" name="tanggal_bimbingan" value="{{ $booking->tanggal_bimbingan }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Catatan Materi</label>
                <textarea name="catatan_tambahan" class="w-full border p-2 rounded">{{ $booking->catatan_tambahan }}</textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('bookings.index') }}" class="text-gray-500 hover:text-gray-700 py-2">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection