@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ffe0f0, #c0e4ff);
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }

    .form-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #ff69b4;
        font-size: 28px;
        font-weight: 700;
    }

    .form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"],
    .form-container select {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 15px;
        border-radius: 12px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .form-container input[type="checkbox"] {
        transform: scale(1.2);
        margin-right: 8px;
        vertical-align: middle;
    }

    .form-container button {
        display: block;
        width: 100%;
        padding: 12px;
        background: linear-gradient(45deg, #ff69b4, #1e90ff);
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-container button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .error-messages {
        background-color: #ffdddd;
        border-left: 6px solid #f44336;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 8px;
    }

    .error-messages ul {
        margin: 0;
        padding-left: 20px;
    }
</style>

<div class="form-container">
    <h2>Tambah User</h2>

    @if($errors->any())
        <div class="error-messages">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Role</label>
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="tentor">Tentor</option>
                <option value="siswa">Siswa</option>
            </select>
        </div>

        <div>
            <label>
                <input type="checkbox" name="is_active" value="1" checked> Aktifkan?
            </label>
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
