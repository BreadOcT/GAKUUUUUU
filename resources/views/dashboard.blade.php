@extends('layout')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600">Ini adalah halaman dashboard siswa.</p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Card Menu 1 -->
            <a href="{{ route('bookings.index') }}" class="block p-6 border rounded hover:bg-blue-50 transition border-blue-200">
                <h3 class="font-bold text-xl text-blue-700 mb-2">📚 Pilih Tentor</h3>
                <p class="text-gray-600">Lihat jadwal dan pilih tentor untuk bimbingan belajar Anda.</p>
            </a>

            <!-- Card Menu 2 -->
            <a href="{{ route('tickets.index') }}" class="block p-6 border rounded hover:bg-green-50 transition border-green-200">
                <h3 class="font-bold text-xl text-green-700 mb-2">📞 Kontak CS</h3>
                <p class="text-gray-600">Laporkan masalah atau tanyakan sesuatu kepada admin.</p>
            </a>
        </div>
    </div>
@endsection