@extends('layouts.app')

@section('title', 'KIP')

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
                                <h2 class="mb-0">KIP</h2>
                                <p class="mb-0 text-sm">Kelola KIP</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('exportkip') }}" class="btn btn-primary"><i class="fas fa-download"></i> Export KIP Excel</a>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-upload"></i> Import KIP Excel</a>
                                <a href="{{ route('kip.create') }}" class="btn btn-success" title="Tambah"><i class="fas fa-plus"></i> Tambah KIP</a>
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Penerima KIP</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $totalKip->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
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

@section('form-search')
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ URL::current() }}" method="GET">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <th class="text-center">#</th>
                    <th class="text-center">Peserta Didik Id</th>
                    <th class="text-center">Nama Penerima Dana</th>
                    <th class="text-center">Sekolah Id</th>
                    <th class="text-center">NPSN</th>
                    <th class="text-center">Nomen Klatur</th>
                    <th class="text-center">rombel</th>
                    <th class="text-center">Nama Ibu</th>
                    <th class="text-center">Nama Ayah</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">NISN</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">No Rekening</th>
                    <th class="text-center">Tahap Id</th>
                    <th class="text-center">Nomor SK</th>
                    <th class="text-center">Nama Rekening</th>
                    <th class="text-center">Tanggal Cair</th>
                    <th class="text-center">Status Cair</th>
                    <th class="text-center">No KIP</th>
                    <th class="text-center">NO KKS</th>
                    <th class="text-center">NO KPS</th>
                    <th class="text-center">Virtual ACC</th>
                    <th class="text-center">Nama Kartu</th>
                    <th class="text-center">Semester Id</th>
                    <th class="text-center">Layak PIP</th>
                    <th class="text-center">Keterangan Pencairan</th>
                    <th class="text-center">Confirmation Text</th>
                    <th class="text-center">Keterangan Tahap</th>

                </thead>
                <tbody>
                    @forelse ($kip as $item)
                        <tr>
                            <td>
                                <a href="{{ route('kip.edit', $item) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->nama }}" data-action="{{ route("kip.destroy", $item) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                            </td>
                            <td>{{ $item->peserta_didik_id }}</td>
                            <td>{{ $item->nama_pd }}</td>
                            <td>{{ $item->sekolah_id }}</td>
                            <td>{{ $item->npsn }}</td>
                            <td>{{ $item->nomenklatur }}</td>
                            <td>{{ $item->rombel ? $item->rombel->nama : '-' }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->nama_ayah }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                            <td>{{ $item->nominal }}</td>
                            <td>{{ $item->no_rekening }}</td>
                            <td>{{ $item->tahap_id }}</td>
                            <td>{{ $item->nomor_sk }}</td>
                            <td>{{ $item->nama_rekening }}</td>
                            <td>{{ $item->tanggal_cair }}</td>
                            <td>{{ $item->status_cair == 1 ? "Cair" : "Belum Cair" }}</td>
                            <td>{{ $item->no_kip }}</td>
                            <td>{{ $item->no_kks }}</td>
                            <td>{{ $item->no_kps }}</td>
                            <td>{{ $item->virtual_acc }}</td>
                            <td>{{ $item->nama_kartu}}</td>
                            <td>{{ $item->semester_id }}</td>
                            <td>{{ $item->layak_pip == 1 ? "Ya" : "Tidak"}}</td>
                            <td>{{ $item->keterangan_pencairan}}</td>
                            <td>{{ $item->confirmation_text}}</td>
                            <td>{{ $item->tahap_keterangan}}</td>

                            
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $kip->links() }}
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="row">
                <div class="col-md-12">
                  <p>Import data KIP sesuai format contoh berikut.<br/><a href="{{url('')}}/Contoh-KIP-Excel.xlsx"><i class="fas fa-download"></i> File Contoh Excel KIP</a></p>
                </div>
            </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
           <form action="{{ route('importkip') }}" method="post" enctype="multipart/form-data">
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
                <h6 class="modal-title" id="modal-title-delete">Hapus Data KIP?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus Data KIP akan menghapus semua data yang dimilikinya</p>
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
