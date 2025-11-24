<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title','Admin')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

{{-- NAV HEADER DIHAPUS, TIDAK MUNCUL DI HALAMAN MANAPUN --}}
{{--
<nav style="padding:10px;border-bottom:1px solid #eee;">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
    <a href="{{ route('admin.users.index') }}">Users</a> |
    <a href="{{ route('admin.messages.index') }}">Messages</a> |
    <form action="{{ route('admin.logout') }}" method="POST" style="display:inline">
        @csrf
        <button type="submit">Logout</button>
    </form>
</nav>
--}}

<div style="padding:20px;">
    @if(session('success')) <div style="color:green">{{ session('success') }}</div> @endif
    @if(session('error')) <div style="color:red">{{ session('error') }}</div> @endif

    @yield('content')
</div>
</body>
</html>
