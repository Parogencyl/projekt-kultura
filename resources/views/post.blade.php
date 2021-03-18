<?php

    $post = DB::table('blog')->where('tytul', Request::segment(2))->first();

?>

@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<section class="container mb-4 mt-5">

    <h1 class="font-weight-bold text-center mb-5 mt-2 font-italic" style="font-family: 'Lora', serif;">
        {{ $post->tytul }} </h1>

    <p class="text-justify mb-5" style="font-size: 18px;"> {!! nl2br(e($post->pelny_tekst)) !!} </p>

    <div class="col-xl-7 col-md-9 col-12 mx-auto">
        <img src="{{ asset('/graphics/posts/'.$post->tytul.'.jpg') }}" class="w-100"
            alt="{{ 'zdjęcie'. $post->tytul }}">
    </div>
</section>


@endsection