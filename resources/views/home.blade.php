@extends('layouts.app')

@section('content')
    <div class="content-section">
        <div class="title">
            <h1>Halaman Home</h1>
            <p>Halaman ini merupakan halaman home</p>
        </div>
        <div class="main-content">
            <p>Nama : {{ $name }}</p>
            <p>Mata Pelajaran</p>
            <ul>
                @foreach ($pelajaran as $p)
                    <li>{{ $p }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection