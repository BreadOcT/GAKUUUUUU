@extends('layouts.admin')

@section('title','Dashboard')

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

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        color: #ff69b4;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 30px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.25);
    }

    .card .icon {
        font-size: 40px;
    }

    .card .details {
        text-align: right;
    }

    .card .details h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #333;
    }

    .card .details p {
        margin: 5px 0 0 0;
        font-size: 14px;
        color: #555;
    }

    /* Warna berbeda per card */
    .card.users .icon { color: #ff69b4; }
    .card.tentor .icon { color: #1e90ff; }
    .card.siswa .icon { color: #28a745; }
    .card.messages .icon { color: #ffc107; }

    @media (max-width: 768px) {
        h1 { font-size: 28px; }
        .card .details h3 { font-size: 18px; }
        .card .details p { font-size: 13px; }
    }
</style>

<div class="dashboard-container">
    <h1>Dashboard Admin</h1>

    <div class="cards">
        <a href="{{ route('admin.users.index') }}" class="card users">
            <div class="icon">👥</div>
            <div class="details">
                <h3>{{ $totalUsers }}</h3>
                <p>Total Users</p>
            </div>
        </a>

        <a href="{{ route('admin.users.index', ['role'=>'tentor']) }}" class="card tentor">
            <div class="icon">🎓</div>
            <div class="details">
                <h3>{{ $totalTentor }}</h3>
                <p>Total Tentor</p>
            </div>
        </a>

        <a href="{{ route('admin.users.index', ['role'=>'siswa']) }}" class="card siswa">
            <div class="icon">📚</div>
            <div class="details">
                <h3>{{ $totalSiswa }}</h3>
                <p>Total Siswa</p>
            </div>
        </a>

        <a href="{{ route('admin.messages.index') }}" class="card messages">
            <div class="icon">✉️</div>
            <div class="details">
                <h3>{{ $unreadMessages }}</h3>
                <p>Pesan Belum Dibaca</p>
            </div>
        </a>
    </div>
</div>
@endsection
