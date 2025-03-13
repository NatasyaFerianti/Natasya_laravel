@extends('layouts.layout')
 
 @section('content')
 
 <div class="pagetitle mb-4"> <!-- Kasih margin bawah -->
     <h1>Tambah Pengalaman Kerja</h1>
     <nav>
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
             <li class="breadcrumb-item"><a href="{{ route('pengalaman_kerja.index') }}">Riwayat Hidup</a></li>
             <li class="breadcrumb-item"><a href="{{ route('pengalaman_kerja.index') }}">Pengalaman Kerja</a></li>
             <li class="breadcrumb-item active">Tambah Pengalaman Kerja</li>
         </ol>
     </nav>
 </div><!-- End Page Title -->
 
 <section class="wrapper">
     <div class="panel panel-default mb-4"> <!-- Margin bawah -->
         <div class="panel-heading fw-semibold fs-5 mb-3 text-center">Form Tambah Pengalaman Kerja</div> <!-- Jarak bawah -->
         <div class="panel-body">
             @if ($errors->any())
             <div class="alert alert-danger mb-3">
                 <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
             @endif
             <form action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store') }}" method="POST">
                 @csrf
                 <div class="form-group mb-3"> <!-- Margin bawah -->
                     <label>Nama Perusahaan</label>
                     <input type="text" name="name" class="form-control" required>
                 </div>
                 <div class="form-group mb-3">
                     <label>Jabatan</label>
                     <input type="text" name="jabatan" class="form-control" required>
                 </div>
                 <div class="form-group mb-3">
                     <label>Tahun Masuk</label>
                     <input type="number" name="tahun_masuk" class="form-control" required>
                 </div>
                 <div class="form-group mb-3">
                     <label>Tahun Keluar</label>
                     <input type="number" name="tahun_keluar" class="form-control">
                 </div>
                 <div class="mt-4"> <!-- Jarak atas buat tombol -->
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 @endsection