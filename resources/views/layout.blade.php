<!DOCTYPE html>
<html>
<head>
    <title>Bimbel Siswa</title>
    <script src="[https://cdn.tailwindcss.com](https://cdn.tailwindcss.com)"></script>
</head>
<body class="bg-gray-100 p-10">
    <nav class="bg-white p-4 rounded shadow mb-5 flex justify-between">
        <div class="font-bold text-xl">Portal Siswa</div>
        <div>
            <a href="{{ route('bookings.index') }}" class="mr-4 text-blue-600">Pilih Tentor</a>
            <a href="{{ route('tickets.index') }}" class="mr-4 text-blue-600">Kontak CS</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf <button type="submit" class="text-red-600">Logout</button>
            </form>
        </div>
    </nav>
    
    <div class="container mx-auto">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
