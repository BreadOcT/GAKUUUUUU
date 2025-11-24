@extends('layouts.admin')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .edit-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 25px;
        background: linear-gradient(135deg, #ffc0cb, #87ceeb);
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        color: #333;
    }

    .edit-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #fff;
        text-shadow: 1px 1px 2px #00000050;
    }

    .edit-container form div {
        margin-bottom: 15px;
    }

    .edit-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #fff;
        text-shadow: 1px 1px 2px #00000050;
    }

    .edit-container input[type="text"],
    .edit-container input[type="email"],
    .edit-container input[type="password"],
    .edit-container select {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .edit-container input[type="checkbox"] {
        transform: scale(1.2);
        margin-right: 5px;
    }

    .edit-container button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #ff69b4; /* pink */
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .edit-container button:hover {
        background-color: #1e90ff; /* biru */
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

<div class="edit-container">
    <h2>Edit User</h2>

    @if($errors->any())
    <div class="error-messages">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label>Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Role</label>
            <select name="role">
                <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                <option value="tentor" {{ $user->role=='tentor'?'selected':'' }}>Tentor</option>
                <option value="siswa" {{ $user->role=='siswa'?'selected':'' }}>Siswa</option>
            </select>
        </div>

       <div>
    <label>
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }}> Aktifkan?
    </label>
</div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
