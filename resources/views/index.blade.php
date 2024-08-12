@extends('layouts.layout')
@section('title', 'Website Pelayanan Desa '. $desa->nama_desa  .' - Beranda')

@section('styles')
<meta name="description" content="Website Pelayanan Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}. Melayani pembuatan surat keterangan secara online">

<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" >
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .ikon {
        font-family: fontAwesome;
    }

    .progress-label > span {
        color: white;
    }

    .progress-percentage > span {
        color: white;
    }

    .judul {
        color: white;
    }

    .animate-up:hover {
        top: -5px;
    }
</style>
@endsection

@section('header')
<h1 class="text-white text-sm text-muted">SELAMAT DATANG DI WEBSITE RESMI</h1>
<h2 class="text-lead text-white">DESA {{ Str::upper($desa->nama_desa) }} <br> KECAMATAN {{ Str::upper($desa->nama_kecamatan) }} <br/>KABUPATEN {{ Str::upper($desa->nama_kabupaten) }}</h2>
@endsection
@push('scripts')
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/apbdes.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#owl-one').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed:1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });

</script>
@endpush
