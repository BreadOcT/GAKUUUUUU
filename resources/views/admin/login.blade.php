@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ffe0f0, #c0e4ff);
        min-height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.95);
        padding: 40px 30px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        max-width: 400px;
        width: 100%;
    }

    h2 {
        text-align: center;
        color: #ff69b4;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .form-group {
        display: flex;
        flex-direction: column; /* label di atas input */
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        width: 100%;
        text-align: left;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        border-radius: 12px;
        border: 1px solid #ccc;
        font-size: 15px;
        transition: 0.3s;
        box-sizing: border-box;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #ff69b4;
        outline: none;
        box-shadow: 0 0 5px rgba(255,105,180,0.4);
    }

    button {
        width: 100%;
        padding: 14px;
        background: linear-gradient(45deg, #ff69b4, #1e90ff);
        color: #fff;
        font-weight: 600;
        font-size: 16px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .error-message {
        background-color: #dc35451a;
        color: #dc3545;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: 600;
        text-align: center;
    }

</style>

<div class="login-container">
    <h2>Login Admin</h2>

    @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit">Login</button>
    </form>
</div>
@endsection
