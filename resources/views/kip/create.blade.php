@extends('layouts.app')

@section('title', 'Tambah Kip')

@section('styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah KIP</h2>
                                <p class="mb-0 text-sm">Kelola KIP</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("kip.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            <div class="card-body">
                <form autocomplete="off" action="{{ route('kip.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="peserta_didik_id">Peserta Didik Id</label>
                            <input type="text" class="form-control @error('peserta_didik_id') is-invalid @enderror" name="peserta_didik_id" placeholder="Masukkan Peserta Didik ID ..." value="{{ old('peserta_didik_id') }}">
                            @error('peserta_didik_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="sekolah_id">Sekolah Id</label>
                            <input type="text" class="form-control @error('sekolah_id') is-invalid @enderror" name="sekolah_id" placeholder="Masukkan Sekolah ID ..." value="{{ old('sekolah_id') }}">
                            @error('sekolah_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="npsn">NPSN</label>
                            <input type="text" class="form-control @error('npsn') is-invalid @enderror" name="npsn" placeholder="Masukkan NPSN ..." value="{{ old('npsn') }}">
                            @error('npsn')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nomenklatur">Nomenklatur</label>
                            <input type="text" class="form-control @error('nomenklatur') is-invalid @enderror" name="nomenklatur" placeholder="Masukkan Nomenklatur ..." value="{{ old('nomenklatur') }}">
                            @error('nomenklatur')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="rombel_id">Rombel</label>
                            <select style="width: 100%;" class="form-control @error('rombel_id') is-invalid @enderror" name="rombel_id" id="rombel_id">
                                <option selected value="">Pilih Rombel</option>
                                @foreach ($rombel as $item)
                                    <option value="{{ $item->id }}" {{ old('rombel_id') == $item->id ? 'selected="true"' : ''  }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('rombel_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama_pd">Nama Penerima Dana</label>
                            <input type="text" class="form-control @error('nama_pd') is-invalid @enderror" name="nama_pd" placeholder="Masukkan Nama Penerima Dana ..." value="{{ old('nama_pd') }}">
                            @error('nama_pd')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" placeholder="Masukkan Nama Ibu ..." value="{{ old('nama_ibu') }}">
                            @error('nama_ibu')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" placeholder="Masukkan Nama Ayah ..." value="{{ old('nama_ayah') }}">
                            @error('nama_ayah')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir ..." value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Masukkan Tempat Lahir ..." value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nisn">NISN</label>
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" placeholder="Masukkan NISN ..." value="{{ old('nisn') }}">
                            @error('nisn')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                <option selected value="">Pilih Jenis Kelamin</option>
                                <option value="1" {{ old('jenis_kelamin') == 1 ? 'selected="true"' : ''  }}>Laki-laki</option>
                                <option value="2" {{ old('jenis_kelamin') == 2 ? 'selected="true"' : ''  }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nominal">Nominal</label>
                            <input type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal" placeholder="Masukkan Nominal ..." value="{{ old('nominal') }}">
                            @error('nominal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="no_rekening">No Rekening</label>
                            <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening" placeholder="Masukkan No Rekening ..." value="{{ old('no_rekening') }}">
                            @error('no_rekening')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tahap_id">Tahap ID</label>
                            <input type="number" class="form-control @error('tahap_id') is-invalid @enderror" name="tahap_id" placeholder="Masukkan Tahap ID ..." value="{{ old('tahap_id') }}">
                            @error('tahap_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nomor_sk">Nomor SK</label>
                            <input type="text" class="form-control @error('nomor_sk') is-invalid @enderror" name="nomor_sk" placeholder="Masukkan Nomor SK ..." value="{{ old('nomor_sk') }}">
                            @error('nomor_sk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tanggal_sk">Tanggal SK</label>
                            <input type="date" class="form-control @error('tanggal_sk') is-invalid @enderror" name="tanggal_sk" placeholder="Masukkan Tanggal SK ..." value="{{ old('tanggal_sk') }}">
                            @error('tanggal_sk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama_rekening">Nama Rekening</label>
                            <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" name="nama_rekening" placeholder="Masukkan Nama Rekening ..." value="{{ old('nama_rekening') }}">
                            @error('nama_rekening')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tanggal_cair">Tanggal Cair</label>
                            <input type="date" class="form-control @error('tanggal_cair') is-invalid @enderror" name="tanggal_cair" placeholder="Masukkan Tanggal Cair ..." value="{{ old('tanggal_cair') }}">
                            @error('tanggal_cair')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="status_cair">Status Cair</label>
                            <select class="form-control @error('status_cair') is-invalid @enderror" name="status_cair" id="status_cair">
                                <option selected value="">Pilih Status Cair</option>
                                <option value="1" {{ old('status_cair') == 1 ? 'selected="true"' : ''  }}>Cair</option>
                                <option value="2" {{ old('status_cair') == 2 ? 'selected="true"' : ''  }}>Belum cair</option>
                            </select>
                            @error('status_cair')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="no_kip">NO KIP</label>
                            <input type="text" class="form-control @error('no_kip') is-invalid @enderror" name="no_kip" placeholder="Masukkan NO KIP ..." value="{{ old('no_kip') }}">
                            @error('no_kip')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="no_kks">NO KKS</label>
                            <input type="text" class="form-control @error('no_kks') is-invalid @enderror" name="no_kks" placeholder="Masukkan NO KKS ..." value="{{ old('no_kks') }}">
                            @error('no_kks')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="no_kps">NO KPS</label>
                            <input type="text" class="form-control @error('no_kps') is-invalid @enderror" name="no_kps" placeholder="Masukkan NO KPS ..." value="{{ old('no_kps') }}">
                            @error('no_kps')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="virtual_acc">Virtual ACC</label>
                            <input type="text" class="form-control @error('virtual_acc') is-invalid @enderror" name="virtual_acc" placeholder="Masukkan Virtual ACC ..." value="{{ old('virtual_acc') }}">
                            @error('virtual_acc')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama_kartu">Nama Kartu</label>
                            <input type="text" class="form-control @error('nama_kartu') is-invalid @enderror" name="nama_kartu" placeholder="Masukkan Nama Kartu ..." value="{{ old('nama_kartu') }}">
                            @error('nama_kartu')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="semester_id">Semester ID</label>
                            <input type="number" class="form-control @error('semester_id') is-invalid @enderror" name="semester_id" placeholder="Masukkan Semester ID ..." value="{{ old('semester_id') }}">
                            @error('semester_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="layak_pip">Layak PIP</label>
                            <select class="form-control @error('layak_pip') is-invalid @enderror" name="layak_pip" id="layak_pip">
                                <option selected value="">Pilih Layak PIP</option>
                                <option value="1" {{ old('layak_pip') == 1 ? 'selected="true"' : ''  }}>Ya</option>
                                <option value="2" {{ old('layak_pip') == 2 ? 'selected="true"' : ''  }}>Tidak</option>
                            </select>
                            @error('layak_pip')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="keterangan_pencairan">Keterangan Pencairan</label>
                            <input type="text" class="form-control @error('keterangan_pencairan') is-invalid @enderror" name="keterangan_pencairan" placeholder="Masukkan Keterangan Pencairan ..." value="{{ old('keterangan_pencairan') }}">
                            @error('keterangan_pencairan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="confirmation_text">Confirmation Text</label>
                            <input type="text" class="form-control @error('confirmation_text') is-invalid @enderror" name="confirmation_text" placeholder="Masukkan Confirmation Text ..." value="{{ old('confirmation_text') }}">
                            @error('confirmation_text')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tahap_keterangan">Keterangan Tahap</label>
                            <input type="text" class="form-control @error('tahap_keterangan') is-invalid @enderror" name="tahap_keterangan" placeholder="Masukkan Keterangan Tahap ..." value="{{ old('tahap_keterangan') }}">
                            @error('tahap_keterangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#rombel_id').select2({
            placeholder: "Pilih Rombel",
            allowClear: true
        });

        if ($("#dusun").val() != "") {
            $.ajax({
                url: baseURL + '/detailDusun?id=' + $("#dusun").val(),
                method: 'get',
                beforeSend: function () {
                    $('#detail_dusun_id').html(`<option value="">Loading ...</option>`);
                },
                success: function (response) {
                    console.log('oke');
                    $('#detail_dusun_id').html(`<option value="">Pilih RT/RW</option>`);
                    $.each(response, function (i,e) {
                        $('#detail_dusun_id').append(`<option value="${e.id}">${e.rt}/${e.rw}</option>`);
                    });

                    $("#detail_dusun_id").val("{{ old('detail_dusun_id') }}");
                }
            });
        } else {
            $('#detail_dusun_id').html(`<option value="">Pilih RT/RW</option>`);
        }

        $("#dusun").change(function () {
            $.ajax({
                url: baseURL + '/detailDusun?id=' + $(this).val(),
                method: 'get',
                beforeSend: function () {
                    $('#detail_dusun_id').html(`<option value="">Loading ...</option>`);
                },
                success: function (response) {
                    $('#detail_dusun_id').html(`<option value="">Pilih RT/RW</option>`);
                    $.each(response, function (i,e) {
                        $('#detail_dusun_id').append(`<option value="${e.id}">${e.rt}/${e.rw}</option>`);
                    });
                }
            });
        });
    });
</script>
@endpush
