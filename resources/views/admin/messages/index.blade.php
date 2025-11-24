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

    .dashboard-btn {
        display: inline-block;
        margin-bottom: 20px;
        padding: 8px 15px;
        border-radius: 10px;
        background: linear-gradient(45deg, #1e90ff, #ff69b4);
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .dashboard-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .table-container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        max-width: 100%;
        overflow-x: auto;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #ff69b4;
        font-size: 28px;
        font-weight: 700;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Poppins', sans-serif;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        font-size: 14px;
        vertical-align: middle;
    }

    th {
        background-color: #ff69b4;
        color: #fff;
        font-weight: 600;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 12px;
        font-weight: 600;
        color: #fff;
        font-size: 13px;
    }

    .status-belum { background-color: #ffc107; }
    .status-sudah { background-color: #28a745; }
    .status-dibalas { background-color: #17a2b8; }
    .status-selesai { background-color: #6c757d; }

    textarea {
        width: 100%;
        min-height: 40px;
        padding: 5px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 13px;
        resize: none;
    }

    button.reply-btn {
        padding: 5px 10px;
        border-radius: 8px;
        border: none;
        background: linear-gradient(45deg, #ff69b4, #1e90ff);
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button.reply-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .delete-btn {
        background: linear-gradient(45deg, #dc3545, #ff4d4f);
    }
</style>

<a href="{{ route('admin.dashboard') }}" class="dashboard-btn">Dashboard</a>

<div class="table-container">
    <h2>Pesan Customer Service</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Balasan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = ($messages->currentPage() - 1) * $messages->perPage() + 1;
            @endphp
            @foreach($messages as $m)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->email }}</td>
                <td>{{ \Illuminate\Support\Str::limit($m->message, 60) }}</td>
                <td>
                    <form class="reply-form" action="{{ route('admin.messages.update', $m) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea name="balasan">{{ $m->balasan }}</textarea>
                        @if($m->status != 'Sudah') <!-- tombol hilang jika sudah dibalas -->
                        <button type="submit" class="reply-btn">Kirim</button>
                        @endif
                    </form>
                </td>
                <td>
                    <span class="status-badge status-{{ strtolower($m->status) }}">
                        {{ $m->status }}
                    </span>
                </td>
                <td style="text-align:center">
                    <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" onsubmit="return confirm('Hapus pesan?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="reply-btn delete-btn">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination" style="margin-top:15px;">
        {{ $messages->links() }}
    </div>
</div>

<script>
    // Sembunyikan tombol submit setelah diklik
    document.querySelectorAll('.reply-form').forEach(form => {
        form.addEventListener('submit', function() {
            const btn = this.querySelector('button[type="submit"]');
            if(btn) btn.style.display = 'none';
        });
    });
</script>
@endsection
