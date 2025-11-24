@extends('layouts.admin')
@section('content')
<h1>Detail Pesan #{{ $message->id }}</h1>
<p><strong>Nama:</strong> {{ $message->name }}</p>
<p><strong>Email:</strong> {{ $message->email }}</p>
<p><strong>Pesan:</strong><br>{{ $message->message }}</p>

@endsection
