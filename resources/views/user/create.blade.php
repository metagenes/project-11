@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah Admin</h2>
                                <p class="mb-0 text-sm">Akun Pengguna {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('user.kelola-admin') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Tambah Admin</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('user.store') }}" method="post">
                    @csrf 
                    <h6 class="heading-small text-muted mb-4">Masukkan Data Diri</h6>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama  ..." value="{{ old('nama') }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="Email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email ..." value="{{ old('email') }}">
                            @error('email')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        
                        
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password ..." value="{{ old('password') }}">
                            @error('password')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                    <button type="submit" class="btn btn-primary btn-block">TAMBAHKAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on("submit","form", function () {
            $(this).children("button:submit").attr('disabled','disabled');
            $(this).children("button:submit").html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt=""> Loading ...`);
        });
    });
</script>
@endpush
