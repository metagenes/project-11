@extends('layouts.app')

@section('title', 'DTKS')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">DTKS</h2>
                                <p class="mb-0 text-sm">Kelola DTKS</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('exportdtksd') }}" class="btn btn-primary"><i class="fas fa-download"></i> Export DTKS Excel</a>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-upload"></i> Import DTKS Excel</a>
                                <a href="{{ route('dtksd.create') }}" class="btn btn-success" title="Tambah"><i class="fas fa-plus"></i> Tambah DTKS</a>
                            </div>
                        </div>
                        <form class="navbar-search mt-3 cari-none" action="{{ URL::current() }}" method="GET">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Data DTKS</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalDtksd->count()}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
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
<div class="card shadow">
    <div class="card-body">
        <h2>Filter</h2>
        <div class="card">
            <div class="card-header">
                <label>Periode</label>
                <form class="row row-cols-lg-auto g-1">
                    <div class=" col">
                        <div class="input-group">
                            <input placeholder="Dari" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="start" value="{{ $start }}" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input placeholder="Sampai" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="end" value="{{ $end }}" />
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Cari ..." />
                    </div>
                    <div class="col-mb-6">
                        <button class="btn btn-success">Cari</button>
                    </div>
                </form>
            </div>
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <th class="text-center">#</th>
                    <th class="text-center">Periode</th>
                    <th class="text-center">ID DTKS</th>
                    <th class="text-center">KK</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Dusun</th>
                    <th class="text-center">RT</th>
                    <th class="text-center">RW</th>
                    <th class="text-center">Nama Ibu</th>
                    <th class="text-center">Nama Ayah</th>
                  

                </thead>
                <tbody>
                    @forelse ($dtksd as $item)
                        <tr>
                            <td>
                                <a href="{{ route('dtksd.edit', $item) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->nama }}" data-action="{{ route("dtksd.destroy", $item) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                            </td>
                            <td>{{ $item->periode }}</td>
                            <td>{{ $item->id_dtks }}</td>
                            <td>{{ $item->kk }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                            <td>{{ $item->dusun ? $item->dusun->nama : '-' }}</td>
                            <td>{{ $item->rts ? $item->rts->nomor : '-' }}</td>
                            <td>{{ $item->rws ? $item->rws->nomor : '-' }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->nama_ayah }}</td>
                           

                            
                            
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $dtksd->links() }}
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
            <div class="col-md-12">
              <p>Import data DTKS sesuai format contoh berikut.<br/><a href="{{url('')}}/Contoh-DTKS-Excel.xlsx"><i class="fas fa-download"></i> File Contoh Excel DTKS</a></p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <form action="{{ route('importdtksd') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" name="file" required='required'>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                    <button type="Submit" class="btn btn-primary">Import</button>
                </div>
            </div>
         </form>
        </div>
  </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Data DTKS?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus Data DTKS akan menghapus semua data yang dimilikinya</p>
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
@endsection
@push('scripts')
<script src="{{ asset('js/apbdes.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#tahun").change(function () {
            $("#tahun").css('display','none');
            $("#loading-tahun").css('display','');
            $(this).parent().submit();
        });
        $(".tab").click(function () {
            $("tbody").html(`<tr><td colspan="6" align="center">Loading ...</td></tr>`);
        });
    });
</script>

@endpush