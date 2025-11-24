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

    .detail-container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        max-width: 600px;
        margin: 40px auto;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    h2 {
        text-align: center;
        color: #ff69b4;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .detail-container p {
        font-size: 16px;
        margin: 12px 0;
        color: #333;
        line-height: 1.5;
    }

    .detail-container p strong {
        color: #ff69b4;
        width: 120px;
        display: inline-block;
    }

    .btn-container {
        text-align: center;
        margin-top: 30px;
    }

    .btn {
        display: inline-block;
        margin: 0 10px;
        padding: 10px 20px;
        border-radius: 15px;
        text-decoration: none;
        font-weight: 600;
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: linear-gradient(45deg, #ff69b4, #1e90ff);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .btn-back {
        background: linear-gradient(45deg, #6c757d, #343a40);
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    @media (max-width: 600px) {
        .detail-container {
            padding: 20px;
            margin: 20px;
        }

        .detail-container p {
            font-size: 15px;
        }

        .btn {
            padding: 8px 16px;
            font-size: 14px;
        }
    }
</style>

<div class="detail-container">
    <h2>Detail User</h2>

    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
    <p><strong>Aktif:</strong> {{ $user->is_active ? 'Ya' : 'Tidak' }}</p>

    <div class="btn-container">
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-edit">Edit</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-back">Kembali</a>
    </div>
</div>
@endsection
