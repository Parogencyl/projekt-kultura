<?php
    $zespoly = DB::table('zespoly')->orderBy('id', 'DESC')->get();
?>

@extends('layouts.navAdmin')

@section('content')
<link href="{{ asset('css/warsztaty.css') }}" rel="stylesheet">

<section class="container mb-5 mt-5">

    <h1 class="font-weight-bold text-center mb-3"> Zespoły </h1>

    <h4 class="text-center mb-5"> Przyjaciele Stowarzyszenia Inicjatyw Społecznych „PROJEKT KULTURA” to naprawdę
        utalentowane osoby. Możecie się o tym przekonać zapraszając ich na swoje wydarzenie. </h4>

    <div class="row justify-content-center">
        <a href="{{ url('/admin/dodaj_zespol') }}" class="btn btn-lg btn-success mb-5 mt-2"> DODAJ NOWE
            ZESPOŁY </a>
    </div>

    <div class="row mb-5" id="main">

        @foreach ($zespoly as $item)
        <a href="{{ url('/admin/zespoly'.'/'.lcfirst($item->nazwa)) }}"
            class="col-lg-5 col-md-6 col-10 d-flex align-items-stretch position-relative warsztatyDiv mb-4">
            <img src="{{ asset('/graphics/zespoly/'.$item->nazwa.'_1.png') }}" class="w-100">
            <div class="position-absolute text-center text-white warsztatTekst" style="z-index: 1; bottom: 0">
                <div class="col-12 font-weight-bold"> {{ ucfirst($item->nazwa) }} </div>
            </div>
        </a>

        @endforeach


    </div>

</section>

@endsection