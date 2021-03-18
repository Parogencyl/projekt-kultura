<?php

    $title = Request::segment(3);
    $posts = DB::table('blog')->where('tytul', $title)->get();

?>

@extends('layouts.navAdmin')

@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">

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


<section class="container py-5">

    <h1 class="font-weight-bold text-center text-uppercase mb-3"> Edytuj post </h1>

    <form action="{{ url('admin/editPost') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @foreach($posts as $post)

        <input type="hidden" name="id" value="{{ $post->id }}">

        <div class="form-group mb-3">
            <input type="text" class="form-control @error('city2') is-invalid @enderror" name="title"
                value="{{ $post->tytul }}" placeholder="Tytuł postu" required>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="short" rows="3"
                placeholder="Tekst skrócony - tekst na stronę główną" value="{{ $post->skrocony_tekst }}"
                required>{{ $post->skrocony_tekst }}</textarea>
        </div>

        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea2" name="long" rows="5"
                placeholder="Tekst główny - tekst na stronę postu" value="{{ $post->pelny_tekst }}"
                required>{{ $post->pelny_tekst }}</textarea>
        </div>

        <div class="form-group">
            <label for="file-input1" class="font-weight-bold">Wybierz zdjęcie: </label>
            <input id="file-input1" type="file" name="image">
        </div>

        <div class="row justify-content-center">
            <a href="{{ url('/admin') }}" class="btn btn-dark btn-lg mr-4"> WRÓĆ </a>
            <button type="submit" class="btn btn-lg btn-success"> ZMIEŃ </button>
        </div>

        @endforeach
    </form>

</section>


@endsection