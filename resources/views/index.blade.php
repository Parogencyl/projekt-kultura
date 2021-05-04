<?php
    $baners = array();
    if($banersFiles = File::allFiles(public_path('graphics/baners'))){
        for ($i=0; $i < count($banersFiles); $i++) { 
            $baners[$i] =  $banersFiles[$i]->getFilename();
        }
        natsort($baners);
    }

    $posts = DB::table('blog')->orderBy('id', 'DESC')->paginate(4);
?>

@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">

@if($baners)
<section class="container mb-4 mt-5">

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block col-12 my-3 mb-5">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-12 my-3 mb-5">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="12000">
        <ol class="carousel-indicators">
            @if (isset($baners[0]))
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            @if (isset($baners[1]))
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            @if (isset($baners[2]))
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            @endif
            @endif
            @endif
        </ol>
        <div class="carousel-inner">
            @if (isset($baners[0]))
            <div class="carousel-item active">
                <img src="{{ asset('/graphics/baners/'.$baners[0]) }}" class="d-block w-100" height="100%"
                    alt="Baner 1">
            </div>

            @if (isset($baners[1]))
            <div class="carousel-item">
                <img src="{{ asset('/graphics/baners/'.$baners[1]) }}" class="d-block w-100" alt="Baner 2">
            </div>

            @if (isset($baners[2]))
            <div class="carousel-item">
                <img src="{{ asset('/graphics/baners/'.$baners[2]) }}" class="d-block w-100" alt="Baner 3">
            </div>
            @endif
            @endif
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section>
@endif


<section class="container py-5">

    @if (count($posts))
    <h2 class="font-weight-bold text-center mb-5 text-uppercase font-italic" style="font-family: 'Lora', serif;">
        Aktualności </h2>

    <div class="row w-xl-75 w-lg-100 mx-auto" id="main">

        @foreach ($posts as $post)
        <form action="{{ url('/blog/blogPost') }}" method="POST"
            class="d-flex align-items-stretch mb-4 col-xl-5 col-lg-5 col-md-6 col-10">
            @csrf
            <div class="card"> <input type="hidden" name="title" value="{{ $post->tytul }}">
                <button class="bg-white border-0 px-0" type="submit">
                    <div class="card-body pb-0">
                        <h4 class="card-title font-weight-bold mb-0 text-center pb-3"
                            style="font-family: 'Bitter', serif;"> {{ $post->tytul }} </h4>
                    </div>
                    <img class="card-img-top" src="{{ url('/graphics/posts'.'/'.$post->tytul.'.jpg') }}"
                        alt="Post na blogu">
                    <div class="card-body py-2">
                        <p class="mb-0 text-justify"> {{ $post->skrocony_tekst }} </p>
                        <p class="font-weight-normal date py-1 mb-0 text-left">
                            {{ date('Y-m-d H:i', strtotime($post->utworzone)) }}</p>
                    </div>
                </button>
            </div>
        </form>

        @endforeach

    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mx-auto mt-4 mb-4 font-weight-bold" id="pagination">
        {!! $posts->render() !!}
    </div>

    @endif

</section>

@endsection