<?php
    $warsztaty = DB::table('warsztaty')->orderBy('id', 'DESC')->get();
?>

@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/warsztaty.css') }}" rel="stylesheet">

<section class="container mb-5 mt-5">

    <h1 class="font-weight-bold text-center mb-3 font-italic" style="font-family: 'Lora', serif;"> WARSZTATY </h1>

    <h3 class="text-center mb-5 font-weight-normal" style="font-family: 'Lora', serif;"> Projekt kultura zajmuje się
        także
        prowadzeniej warsztatów zarówno dla młodzieży jak i
        dorosłych.</h3>

    <div class="row mb-5" id="main">

        @foreach ($warsztaty as $item)
        <a href="{{ url('/warsztaty'.'/'.lcfirst($item->nazwa)) }}"
            class="col-lg-5 col-md-6 col-10 d-flex align-items-stretch position-relative warsztatyDiv mb-4">
            <img src="{{ asset('/graphics/warsztaty/'.$item->nazwa.'_1.png') }}" class="w-100">
            <div class="position-absolute text-center text-white warsztatTekst" style="z-index: 1; bottom: 0">
                <div class="col-12 font-weight-bold" style="font-family: 'Bitter', serif;"> {{ ucfirst($item->nazwa) }}
                </div>
            </div>
        </a>

        @endforeach
    </div>

</section>

@endsection