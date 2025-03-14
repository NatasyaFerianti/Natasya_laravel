@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Edit Data Pendidikan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i>Pendidikan</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Form Edit Pendidikan
                    </header>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama Sekolah</label>
                                <input type="text" class="form-control" name="nama" value="{{ $pendidikan->nama }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tingkatan">Tingkatan</label>
                                <select class="form-control" name="tingkatan" required>
                                    <option value="" disabled>Pilih Tingkatan</option>
                                    <option value="1" {{ $pendidikan->tingkatan == '1' ? 'selected' : '' }}>TK</option>
                                    <option value="2" {{ $pendidikan->tingkatan == '2' ? 'selected' : '' }}>SD</option>
                                    <option value="3" {{ $pendidikan->tingkatan == '3' ? 'selected' : '' }}>SMP</option>
                                    <option value="4" {{ $pendidikan->tingkatan == '4' ? 'selected' : '' }}>SMA/SMK</option>
                                    <option value="5" {{ $pendidikan->tingkatan == '5' ? 'selected' : '' }}>D3</option>
                                    <option value="6" {{ $pendidikan->tingkatan == '6' ? 'selected' : '' }}>D4/S1</option>
                                    <option value="7" {{ $pendidikan->tingkatan == '7' ? 'selected' : '' }}>S2</option>
                                    <option value="8" {{ $pendidikan->tingkatan == '8' ? 'selected' : '' }}>S3</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tahun_masuk">Tahun Masuk</label>
                                <input type="number" class="form-control" name="tahun_masuk" value="{{ $pendidikan->tahun_masuk }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tahun_keluar">Tahun Selesai</label>
                                <input type="number" class="form-control" name="tahun_keluar" value="{{ $pendidikan->tahun_keluar }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="{{ route('pendidikan.index') }}" class="btn btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection