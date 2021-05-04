<?php
    $warsztaty = DB::table('warsztaty')->orderBy('id', 'DESC')->get();
?>

@extends('layouts.navAdmin')

@section('content')
<link href="{{ asset('css/warsztaty.css') }}" rel="stylesheet">

<div class="container">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block col-12 my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-12 my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>

<section class="container mb-5 mt-5">

    <h1 class="font-weight-bold text-center mb-3"> Warsztaty </h1>

    <h4 class="text-center mb-5"> Stowarzyszenie Inicjatyw Społecznych „PROJEKT KULTURA” to także warsztaty dla dzieci i
        młodzieży. Zachęcamy do zapoznania się z naszą ofertą.</h4>

    <div class="row justify-content-center">
        <a href="{{ url('/admin/dodaj_warsztat') }}" class="btn btn-lg btn-success mb-5 mt-2"> DODAJ NOWE
            WARSZTATY </a>
    </div>

    <div class="row mb-5" id="main">

        @foreach ($warsztaty as $item)
        <div class="offset-lg-1  offset-0"> </div>
        <a href="{{ url('/admin/warsztaty'.'/'.lcfirst($item->nazwa)) }}"
            class="col-lg-4 col-md-6 col-10 d-flex align-items-stretch position-relative warsztatyDiv mb-4">
            <img src="{{ asset('/graphics/warsztaty/'.$item->nazwa.'_1.png') }}" class="w-100">
            <div class="position-absolute text-center text-white warsztatTekst" style="z-index: 1; bottom: 0">
                <div class="col-12 font-weight-bold"> {{ ucfirst($item->nazwa) }} </div>
            </div>
        </a>
        <div class="offset-lg-1 offset-0"> </div>

        @endforeach


    </div>

</section>

@endsection