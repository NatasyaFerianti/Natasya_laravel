@extends('layouts.app')
 
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Riwayat Hidup</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Riwayat Hidup</li>
                <li class="breadcrumb-item active">Pengalaman Kerja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ isset($pengalaman_kerja) ? 'Edit' : 'Tambah' }} Pengalaman Kerja</h5>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Ada kesalahan dalam input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="pengalaman_kerja_form" method="POST"
                            action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store') }}">
                            @csrf
                            {!! isset($pengalaman_kerja) ? method_field('PUT') : '' !!}

                            <input type="hidden" name="id" value="{{ $pengalaman_kerja->id ?? '' }}" />

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '' }}" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jabatan <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jabatan"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '' }}" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tahun Masuk <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '' }}" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tahun Selesai <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_keluar : '' }}" required />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                                    <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div><!-- End Card Body -->
                </div><!-- End Card -->
            </div><!-- End Col -->
        </div><!-- End Row -->
    </section>

</main><!-- End #main -->
@endsection

@push('content-css')
    <link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
@endpush

@push('content-js')
    <script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tahun_masuk, #tahun_keluar').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
    </script>
@endpush
