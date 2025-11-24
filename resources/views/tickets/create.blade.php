@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">✉️ Lapor Masalah / Hubungi CS</h2>
        
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Subjek / Judul Laporan</label>
                <input type="text" name="subjek" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Contoh: Salah pilih tentor" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Pesan Detail</label>
                <textarea name="pesan" rows="5" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Jelaskan masalah Anda di sini..." required></textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('tickets.index') }}" class="text-gray-500 hover:text-gray-700 py-2">Kembali</a>
                <button type="submit" class="bg-green-600 text-white font-bold py-2 px-6 rounded hover:bg-green-700 transition">
                    Kirim Pesan
                </button>
            </div>
        </form>
    </div>
@endsection