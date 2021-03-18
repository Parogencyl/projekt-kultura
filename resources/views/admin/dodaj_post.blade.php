<?php
    $kursy = DB::table('kursy')->get();

?>

@extends('layouts.navAdmin')

@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&display=swap" rel="stylesheet">

<section class="container mb-5 mt-5">

    <h1 class="font-weight-bold text-center text-uppercase mb-3"> Dodaj post </h1>

    <form action="{{ url('admin/addPost') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Tytuł postu"
                required>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="short" rows="3"
                placeholder="Tekst skrócony - tekst na stronę główną" value="{{ old('short') }}" required></textarea>
        </div>

        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea2" name="long" rows="5"
                placeholder="Tekst główny - tekst na stronę postu" value="{{ old('long') }}" required></textarea>
        </div>

        <div class="form-group">
            <label for="file-input1" class="font-weight-bold">Wybierz zdjęcie: </label>
            <input id="file-input1" type="file" name="image" required>
        </div>

        <div class="row justify-content-center">
            <a href="{{ url('/admin') }}" class="btn btn-dark btn-lg mr-4"> WRÓĆ </a>
            <button type="submit" class="btn btn-lg btn-success"> DODAJ </button>
        </div>
    </form>

</section>

@endsection