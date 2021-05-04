<?php
    $warsztat = DB::table('warsztaty')->where('nazwa', Request::segment(3))->first();
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

    <h1 class="font-weight-bold text-center mb-3 text-uppercase"> Edytuj warsztat </h1>

    <h4 class="text-center mb-5"> {{ $warsztat->nazwa }} </h4>

    <form action="{{ url('admin/edytuj_warsztat') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $warsztat->id }}">

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="name" value="{{ $warsztat->nazwa }}"
                placeholder="Nazwa warsztatu" disabled>
        </div>

        <div class="form-group">
            <textarea class="form-control" name="text" rows="4" placeholder="Główny tekst" value="{{ $warsztat->text }}"
                required>{{ $warsztat->text }}</textarea>
        </div>

        <div class="form-check mb-4">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="czy_sprzedawac">
            <label class="form-check-label" for="exampleCheck1">Czy sprzedawać</label>
        </div>

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="price" value="{{ $warsztat->cena }}"
                placeholder="Cena warsztatu">
        </div>

        <div class="form-group">
            <label for="file-input1" class="font-weight-bold">Wybierz zdjęcie 1: </label>
            <input id="file-input1" type="file" name="zdjecie1">
        </div>

        <div class="form-group">
            <label for="file-input2" class="font-weight-bold">Wybierz zdjęcie 2: </label>
            <input id="file-input2" type="file" name="zdjecie2">
        </div>

        <div class="form-group">
            <label for="file-input3" class="font-weight-bold">Wybierz zdjęcie 3: </label>
            <input id="file-input3" type="file" name="zdjecie3">
        </div>

        <div class="form-group">
            <label for="file-input4" class="font-weight-bold">Wybierz zdjęcie 4: </label>
            <input id="file-input4" type="file" name="zdjecie4">
        </div>

        <div class="row justify-content-center">
            <a href="{{ url('/admin/warsztaty') }}" class="btn btn-dark btn-lg mr-4"> WRÓĆ </a>
            <button type="submit" value="submit" name="submit" class="btn btn-lg btn-success mr-4"> ZMIEŃ </button>
            <button type="submit" value="delete" name="submit" class="btn btn-lg btn-danger"> USUŃ </button>
        </div>

    </form>

</section>

@endsection