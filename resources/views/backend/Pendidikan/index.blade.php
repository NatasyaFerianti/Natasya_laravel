@extends('layouts.app')

@section('content')
 
 <div class="pagetitle">
     <h1>Riwayat Hidup</h1>
     <nav>
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
             <li class="breadcrumb-item active">Riwayat Hidup</li>
             <li class="breadcrumb-item active">Pendidikan</li>
         </ol>
     </nav>
 </div><!-- End Page Title -->
 
 <section class="wrapper">
     <div class="row">
         <div class="col-lg-12">
             <section class="panel">
 
                 <div class="panel-body">
                     @if (session('success'))
                     <div class="alert alert-success">
                         <p>{{ session('success') }}</p>
                     </div>
                     @endif
 
                     <a href="{{ route('pendidikan.create') }}" class="btn btn-primary mb-3">
                         <i class="fa fa-plus"></i> Tambah
                     </a>
                 </div>
 
                 <div class="table-responsive">
                     <table class="table table-striped table-bordered">
                         <thead>
                             <!-- Baris baru untuk tulisan "Pendidikan" -->
                             <tr class="table-light">
                                 <th colspan="5" class="text-center" style="font-size: 16px; font-weight: bold;">
                                     Pendidikan
                                 </th>
                             </tr>
                             <!-- Baris header tabel utama -->
                             <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Tingkatan</th>
                                 <th>Tahun Masuk</th>
                                 <th>Tahun Selesai</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($pendidikan as $key => $item)
                             <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $item->nama }}</td>
                                 <td>
                                     @if ($item->tingkatan==1)
                                     TK
                                     @elseif ($item->tingkatan==2)
                                     SD
                                     @elseif ($item->tingkatan==3)
                                     SMP
                                     @elseif ($item->tingkatan==4)
                                     SMA/SMK
                                     @elseif ($item->tingkatan==5)
                                     D3
                                     @elseif ($item->tingkatan==6)
                                     D4/S1
                                     @elseif ($item->tingkatan==7)
                                     S2
                                     @elseif ($item->tingkatan==8)
                                     S3
                                     @endif
                                 </td>
                                 <td>{{ $item->tahun_masuk }}</td>
                                 <td>{{ $item->tahun_keluar ?? '-' }}</td>
                                 <td>
                                     <a class="btn btn-warning btn-sm" href="{{ route('pendidikan.edit', $item->id) }}">
                                         <i class="fa fa-edit"></i> Edit
                                     </a>
                                     <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                             <i class="fa fa-trash"></i> Hapus
                                         </button>
                                     </form>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div> <!-- End table-responsive -->
             </section>
         </div>
     </div>
 </section>
 @endsection