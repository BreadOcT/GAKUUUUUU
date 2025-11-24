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
        background: linear-gradient(45deg, #1e90ff, #ff69b4);
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .dashboard-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .success-message {
        text-align: center;
        font-size: 28px;
        font-weight: 700;
        color: #1e90ff;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 15px;
        background: rgba(40, 167, 69, 0.1);
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
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

    a.add-user-btn {
        display: inline-block;
        margin-bottom: 15px;
        padding: 10px 20px;
        background: linear-gradient(45deg, #ff69b4, #1e90ff);
        color: #fff;
        text-decoration: none;
        border-radius: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    a.add-user-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Poppins', sans-serif;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
        font-size: 14px;
    }

    th {
        background-color: #ff69b4;
        color: #fff;
        font-weight: 600;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .status-btn {
        display: inline-block;
        padding: 6px 12px;
        border: none;
        border-radius: 12px;
        color: #fff;
        font-weight: 600;
        cursor: default;
        font-size: 13px;
    }

    .status-active {
        background-color: #28a745;
    }

    .status-inactive {
        background-color: #dc3545;
    }

    .action-btn {
        display: inline-block;
        margin: 0 3px;
        padding: 6px 12px;
        background: linear-gradient(45deg, #ff69b4, #1e90ff);
        color: #fff;
        text-decoration: none;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .delete-btn {
        background: linear-gradient(45deg, #dc3545, #ff4d4f);
    }

    .delete-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .pagination ul {
        display: flex;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 3px;
    }

    .pagination a, .pagination span {
        display: block;
        padding: 8px 12px;
        border-radius: 12px;
        background-color: #ff69b4;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination a:hover {
        background-color: #1e90ff;
    }

    .pagination .active span {
        background-color: #1e90ff;
    }
</style>

<!-- Tombol kembali ke dashboard -->
<a href="{{ route('admin.dashboard') }}" class="dashboard-btn">Dashboard</a>

<div class="table-container">
    <h2>Daftar User</h2>

    <a href="{{ route('admin.users.create') }}" class="add-user-btn">Tambah User</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $users->firstItem() + $index }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <span class="status-btn {{ $user->is_active ? 'status-active' : 'status-inactive' }}">
                        {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.users.show', $user->id) }}" class="action-btn">Detail</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn"
                            onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $users->links() }}
    </div>
</div>
@endsection
