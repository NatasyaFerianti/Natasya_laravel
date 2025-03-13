@extends('layouts.app')

@section('content')
 
 <div class="pagetitle mb-4">
     <h1>{{ isset($pendidikan) ? 'Mengubah' : 'Menambahkan' }} Pendidikan</h1>
     <nav>
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
             <li class="breadcrumb-item"><a href="{{ route('pendidikan.index') }}">Riwayat Hidup</a></li>
             <li class="breadcrumb-item"><a href="{{ route('pendidikan.index') }}">Pendidikan</a></li>
             <li class="breadcrumb-item active">{{ isset($pendidikan) ? 'Edit' : 'Tambah' }} Pendidikan</li>
         </ol>
     </nav>
 </div><!-- End Page Title -->
 
 <section class="wrapper">
     <div class="panel panel-default mb-4">
         <div class="panel-heading fw-semibold fs-5 mb-3 text-center">Form {{ isset($pendidikan) ? 'Edit' : 'Tambah' }} Pendidikan</div>
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
             <form action="{{ isset($pendidikan) ? route('pendidikan.update', $pendidikan->id) : route('pendidikan.store') }}" method="POST">
                 @csrf
                 @if(isset($pendidikan))
                 @method('PUT')
                 @endif
 
                 <div class="form-group mb-3">
                     <label>Nama Sekolah <span class="text-danger">*</span></label>
                     <input type="text" name="nama" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->nama : '' }}" required>
                 </div>
 
                 <div class="form-group mb-3">
                     <label>Tingkatan <span class="text-danger">*</span></label>
                     <select class="form-control" name="tingkatan" required>
                         <option value="1" {{ isset($pendidikan) && $pendidikan->tingkatan == 'TK/PAUD' ? 'selected' : '' }}>TK/PAUD</option>
                         <option value="2" {{ isset($pendidikan) && $pendidikan->tingkatan == 'SD' ? 'selected' : '' }}>SD</option>
                         <option value="3" {{ isset($pendidikan) && $pendidikan->tingkatan == 'SMP' ? 'selected' : '' }}>SMP</option>
                         <option value="4" {{ isset($pendidikan) && $pendidikan->tingkatan == 'SMA' ? 'selected' : '' }}>SMA</option>
                         <option value="5" {{ isset($pendidikan) && $pendidikan->tingkatan == 'D3' ? 'selected' : '' }}>D3</option>
                         <option value="6" {{ isset($pendidikan) && $pendidikan->tingkatan == 'S1' ? 'selected' : '' }}>S1</option>
                         <option value="7" {{ isset($pendidikan) && $pendidikan->tingkatan == 'S2' ? 'selected' : '' }}>S2</option>
                         <option value="8" {{ isset($pendidikan) && $pendidikan->tingkatan == 'S3' ? 'selected' : '' }}>S3</option>
                     </select>
                 </div>
 
                 <div class="form-group mb-3">
                     <label>Tahun Masuk <span class="text-danger">*</span></label>
                     <input type="number" name="tahun_masuk" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->tahun_masuk : '' }}" required>
                 </div>
 
                 <div class="form-group mb-3">
                     <label>Tahun Selesai <span class="text-danger">*</span></label>
                     <input type="number" name="tahun_keluar" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->tahun_keluar : '' }}" required>
                 </div>
 
                 <div class="mt-4">
                     <button type="submit" class="btn btn-primary">{{ isset($pendidikan) ? 'Update' : 'Save' }}</button>
                     <a href="{{ route('pendidikan.index') }}" class="btn btn-default">Cancel</a>
                 </div>
             </form>
         </div>
     </div>
 </section>
 @endsection