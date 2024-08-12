@extends('layouts.app')

@section('title', 'Edit BPJS Mandiri')

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
                                <h2 class="mb-0">Edit BPJS Mandiri</h2>
                                <p class="mb-0 text-sm">Kelola BPJS Mandiri</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("bpjs-mandiri.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <form autocomplete="off" action="{{ route('bpjs-mandiri.update', $bpjs_mandiri) }}" method="post">
                    @csrf @method('patch')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="id_dtks">ID DTKS</label>
                            <input type="text" class="form-control @error('id_dtks') is-invalid @enderror" name="id_dtks" placeholder="Masukkan NIK ..." value="{{ old('id_dtks', $bpjs_mandiri->id_dtks) }}">
                            @error('id_dtks')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-12">
                            <label class="form-control-label" for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Masukkan Alamat ...">{{ old('alamat', $bpjs_mandiri->alamat) }}</textarea>
                            @error('alamat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="dusun_id">Dusun</label>
                            <select style="width: 100%;" class="form-control @error('dusun_id') is-invalid @enderror" name="dusun_id" id="dusun_id">
                                <option selected value="">Pilih Dusun</option>
                                @foreach ($dusun as $item)
                                    <option value="{{ $item->id }}" {{ old('dusun_id', $bpjs_mandiri->dusun_id) == $item->id ? 'selected' : ''  }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('dusun_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="rts_id">RT</label>
                            <select style="width: 100%;" class="form-control @error('rts_id') is-invalid @enderror" name="rts_id" id="rts_id">
                                <option selected value="">Pilih RT</option>
                                @foreach ($rts as $item)
                                    <option value="{{ $item->id }}" {{ old('rts_id', $bpjs_mandiri->rts_id) == $item->id ? 'selected' : ''  }}>{{ $item->nomor }}</option>
                                @endforeach
                            </select>
                            @error('rts_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="rws_id">RW</label>
                            <select style="width: 100%;" class="form-control @error('rws_id') is-invalid @enderror" name="rws_id" id="rws_id">
                                <option selected value="">Pilih RW</option>
                                @foreach ($rws as $item)
                                    <option value="{{ $item->id }}" {{ old('rws_id', $bpjs_mandiri->rws_id) == $item->id ? 'selected' : ''  }}>{{ $item->nomor }}</option>
                                @endforeach
                            </select>
                            @error('rws_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="kk">KK</label>
                            <input type="text" class="form-control @error('kk') is-invalid @enderror" name="kk" placeholder="Masukkan KK ..." value="{{ old('kk', $bpjs_mandiri->kk) }}">
                            @error('kk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nik">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="Masukkan NIK ..." value="{{ old('nik', $bpjs_mandiri->nik) }}">
                            @error('nik')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama ..." value="{{ old('nama', $bpjs_mandiri->nama) }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir ..." value="{{ old('tanggal_lahir', $bpjs_mandiri->tanggal_lahir) }}">
                            @error('tanggal_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Masukkan Tempat Lahir ..." value="{{ old('tempat_lahir', $bpjs_mandiri->tempat_lahir) }}">
                            @error('tempat_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="1" {{ old('jenis_kelamin', $bpjs_mandiri->jenis_kelamin) == 1 ? 'selected' : ''  }}>Laki-laki</option>
                                <option value="2" {{ old('jenis_kelamin', $bpjs_mandiri->jenis_kelamin) == 2 ? 'selected' : ''  }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="pekerjaan_id">Pekerjaan</label>
                            <select class="form-control @error('pekerjaan_id') is-invalid @enderror" name="pekerjaan_id" id="pekerjaan_id">
                                <option value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaan as $item)
                                    <option value="{{ $item->id }}" {{ old('pekerjaan_id', $bpjs_mandiri->pekerjaan_id) == $item->id ? 'selected' : ''  }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('pekerjaan_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" placeholder="Masukkan Nama Ibu ..." value="{{ old('nama_ibu', $bpjs_mandiri->nama_ibu) }}">
                            @error('nama_ibu')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="status_hubungan_dalam_keluarga_id">Status Hubungan Dalam Keluarga</label>
                            <select class="form-control @error('status_hubungan_dalam_keluarga_id') is-invalid @enderror" name="status_hubungan_dalam_keluarga_id" id="status_hubungan_dalam_keluarga_id">
                                <option value="">Pilih Status Hubungan Dalam Keluarga</option>
                                @foreach ($status_hubungan_dalam_keluarga as $item)
                                    <option value="{{ $item->id }}" {{ old('status_hubungan_dalam_keluarga_id', $bpjs_mandiri->status_hubungan_dalam_keluarga_id) == $item->id ? 'selected' : ''  }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('status_hubungan_dalam_keluarga_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label class="form-control-label" for="keterangan_padan">Keterangan Padan</label>
                            <select class="form-control @error('keterangan_padan') is-invalid @enderror" name="keterangan_padan" id="keterangan_padan">
                                <option value="">Pilih Keterangan Padan</option>
                                <option value="1" {{ old('keterangan_padan',$bpjs_mandiri->keterangan_padan) == 1 ? 'selected' : ''  }}>Padan</option>
                                <option value="2" {{ old('keterangan_padan',$bpjs_mandiri->keterangan_padan) == 2 ? 'selected' : ''  }}>Tidak Padan</option>
                            </select>
                            @error('keterangan_padan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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
        $('#pekerjaan_id').select2({
            placeholder: "Pilih Pekerjaan",
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

                    $("#detail_dusun_id").val("{{ $bpjs_mandiri->detail_dusun_id }}");
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
