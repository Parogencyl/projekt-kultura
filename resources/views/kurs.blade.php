<?php 
    $kurs = DB::table('kursy')->where('id', session('kurs')->kurs)->first();
?>

@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/szkolenia.css') }}" rel="stylesheet">

<section class="container mb-5 mt-5">

    <h1 class="font-weight-bold text-center"> {{ $kurs->nazwa }} </h1>

    <h4 class="text-center mb-5"> Kurs ten składa się z {{ $kurs->liczba_filmow }} części, które zostały zamieszczone
        poniżej.
    </h4>


    <div class="row justify-content-center mb-5">

        <div class="col-lg-5 col-md-6 col-12 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload">
                <source src="{{ asset('/graphics/kursy/filmik.mp4') }}" type="video/mp4">
            </video>
            <p class="text-center font-weight-bold"> {{ $kurs->rozdzial1_tytul }} </p>
        </div>

        @if (isset($kurs->rozdzial2_tytul))
        <div class="col-lg-5 col-md-6 col-12 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload">
                <source src="{{ asset('/graphics/kursy/filmik.mp4') }}" type="video/mp4">
            </video>
            <p class="text-center font-weight-bold"> {{ $kurs->rozdzial2_tytul }} </p>
        </div>
        @endif

        @if (isset($kurs->rozdzial3_tytul))
        <div class="col-lg-5 col-md-6 col-12 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload">
                <source src="{{ asset('/graphics/kursy/filmik.mp4') }}" type="video/mp4">
            </video>
            <p class="text-center font-weight-bold"> {{ $kurs->rozdzial3_tytul }} </p>
        </div>
        @endif

        @if (isset($kurs->rozdzial4_tytul))
        <div class="col-lg-5 col-md-6 col-12 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload">
                <source src="{{ asset('/graphics/kursy/filmik.mp4') }}" type="video/mp4">
            </video>
            <p class="text-center font-weight-bold"> {{ $kurs->rozdzial4_tytul }} </p>
        </div>
        @endif

        @if (isset($kurs->rozdzial5_tytul))
        <div class="col-lg-5 col-md-6 col-12 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload">
                <source src="{{ asset('/graphics/kursy/filmik.mp4') }}" type="video/mp4">
            </video>
            <p class="text-center font-weight-bold"> {{ $kurs->rozdzial5_tytul }} </p>
        </div>
        @endif

        @if (isset($kurs->rozdzial6_tytul))
        <div class="col-lg-5 col-md-6 col-12 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload">
                <source src="{{ asset('/graphics/kursy/filmik.mp4') }}" type="video/mp4">
            </video>
            <p class="text-center font-weight-bold"> {{ $kurs->rozdzial6_tytul }} </p>
        </div>
        @endif

    </div>


</section>

<script>
    $(document).ready(function(){
        $('video').bind('contextmenu',function() { return false; });
    });
</script>

@endsection