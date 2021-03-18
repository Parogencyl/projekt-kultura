<?php

    $kurs = DB::table('kursy')->where('nazwa', Request::segment(3))->first();
?>

@extends('layouts.navAdmin')

@section('content')
<link href="{{ asset('css/szkolenia.css') }}" rel="stylesheet">

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

    <h1 class="font-weight-bold text-center mb-3 text-uppercase "> Edytuj kurs </h1>

    <h4 class="text-center mb-5"> {{ $kurs->nazwa }} </h4>

    <form action="{{ url('/admin/edytuj_kurs') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $kurs->id }}">

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="name" value="{{ $kurs->nazwa }}" placeholder="Nazwa kursu"
                required disabled>
        </div>

        <div class="form-group">
            <input class="form-control" id="exampleFormControlTextarea1" name="laczny_czas" placeholder="Czas kursu"
                type="time" value="{{ $kurs->laczny_czas }}" required>
        </div>

        <div class="input-group">
            <input class="form-control" type="text" id="inlineFormInputGroupPrice1" name="price"
                placeholder="Cena - wariant I" value="{{ $kurs->cena }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">zł</div>
            </div>
        </div>
        <small> Grosze należy podać po znaku . (199.99) </small>

        <div class="input-group">
            <input class="form-control" type="text" name="price2" placeholder="Cena - wariant II"
                value="{{ $kurs->cena2 }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">zł</div>
            </div>
        </div>
        <small> Grosze należy podać po znaku . (199.99) </small>

        <div class="input-group">
            <input class="form-control" type="text" name="price3" placeholder="Cena - wariant III"
                value="{{ $kurs->cena3 }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">zł</div>
            </div>
        </div>
        <small> Grosze należy podać po znaku . (199.99) </small>

        <div class="form-group">
            <textarea class="form-control" name="learn" rows="4"
                placeholder="Czego się nauczysz w kursie (każdy punkt odzielony znakiem | )"
                value="{{ $kurs->czego_sie_nauczysz }}" required>{{ $kurs->czego_sie_nauczysz }}</textarea>
        </div>

        <div class="form-group">
            <label for="file-input1" class="font-weight-bold">Wybierz zwiastun: </label>
            <input id="file-input1" type="file" name="videoZwiastun">
        </div>

        <div class="row justify-content-center p-0 m-0">
            <a href="{{ url('/admin/szkolenia') }}" class="btn btn-dark btn-lg mr-4"> WRÓĆ </a>
            <button type="submit" value="submit" name="submit" class="btn btn-lg btn-success mr-4"> ZMIEŃ </button>
            <button type="submit" value="delete" name="submit" class="btn btn-lg btn-danger"> USUŃ </button>
        </div>

    </form>

</section>


@endsection