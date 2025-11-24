<!DOCTYPE html>
<html>
<head>
    <title>Login Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 h-screen flex justify-center items-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Login Bimbel</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="siswa@bimbel.com" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="password" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>