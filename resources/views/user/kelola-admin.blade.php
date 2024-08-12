@extends('layouts.app')

@section('title', 'Kelola Admin')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Kelola Admin</h2>
                                <p class="mb-0 text-sm">Akun Pengguna {{ config('app.name') }}</p>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <a href="{{ route('user.create') }}" class="btn btn-success" title="Tambah Admin"><i class="fas fa-plus"></i> Tambah </a>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('profil') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
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
                <h3 class="mb-0">Kelola Admin</h3>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-striped table-bordered">
                            <thead>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
            
                            </thead>
                            <tbody>
                                @forelse ($user as $item)
                                    <tr>
                                        <td align="center">
                                            <a  class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->nama }}" data-action="{{ route("user.destroy", $item) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                                        </td>
                                        <td style="text-align:center">{{ $item->nama }}</td>
                                        <td style="text-align:center">{{ $item->email }}</td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" align="center">Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $user->links() }}
                </div>
            </div>
            
            <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
            
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-delete">Hapus Admin?</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
            
                        <div class="modal-body">
            
                            <div class="py-3 text-center">
                                <i class="ni ni-bell-55 ni-3x"></i>
                                <h4 class="heading mt-4">Perhatian!!</h4>
                                <p>Menghapus Data Admin akan menghapus semua data yang dimilikinya</p>
                                <p><strong id="nama-hapus"></strong></p>
                            </div>
            
                        </div>
            
                        <div class="modal-footer">
                            <form id="form-hapus" action="" method="POST" >
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-white">Yakin</button>
                            </form>
                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
                        </div>
            
                    </div>
                </div>
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
