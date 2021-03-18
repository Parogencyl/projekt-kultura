<?php

    $name = request()->segment(count(request()->segments()));
    $warsztat = DB::table('warsztaty')->where('nazwa', $name)->first();

    $images = array();
    if($imagesFiles = File::allFiles(public_path('graphics/warsztaty'))){
        for ($i=0; $i < count($imagesFiles); $i++) { 
            if(strpos($imagesFiles[$i]->getFilename(), $warsztat->nazwa) !== false){
                $images[$i] =  $imagesFiles[$i]->getFilename();
            }
        }
        $images = array_values($images);
    }

?>

@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/warsztaty.css') }}" rel="stylesheet">

<section class="container mb-5 mt-5">

    <div class="d-flex justify-content-center">
        <h1 id="title" class="font-weight-bold mb-0 text-center font-italic text-uppercase"
            style="font-family: 'Lora', serif;">
            {{ ucfirst($warsztat->nazwa) }} </h1>
    </div>
    <div id="box" class="mx-auto mb-5"></div>

    <div class="row justify-content-center mb-5">

        <div class="col-md-5 col-sm-8 col-10 mb-4">
            @for ($i = 0; $i < count($images); $i++) <img src="{{ asset('/graphics/warsztaty/'.$images[$i]) }}"
                class="w-100 mb-4">
                @endfor
        </div>
        <div class="col-md-7 col-12 mb-4">
            @if (isset($warsztat->title1))
            <h3 class="font-weight-bold" style="font-family: 'Bitter', serif;"> {{ $warsztat->title1 }} </h3>
            @endif
            @if (isset($warsztat->text1))
            <p class="text-justify mb-5" style="font-size: 17px;"> {!! nl2br(e($warsztat->text1)) !!} </p>
            @endif

            @if (isset($warsztat->title2))
            <h3 class="font-weight-bold" style="font-family: 'Bitter', serif;"> {{ $warsztat->title2 }} </h3>
            @endif
            @if (isset($warsztat->text2))
            <p class="text-justify mb-5" style="font-size: 17px;"> {!! nl2br(e($warsztat->text2)) !!} </p>
            @endif

            @if (isset($warsztat->title3))
            <h3 class="font-weight-bold" style="font-family: 'Bitter', serif;"> {{ $warsztat->title3 }} </h3>
            @endif
            @if (isset($warsztat->text3))
            <p class="text-justify" style="font-size: 17px;"> {!! nl2br(e($warsztat->text3)) !!} </p>
            @endif

        </div>

    </div>

</section>

<script>
    if(window.innerWidth <= (Number(document.getElementById('title').offsetWidth) + 100)){
        document.getElementById('box').style.width = (Number(document.getElementById('title').offsetWidth) + 0) +"px";
    }else{
        document.getElementById('box').style.width = (Number(document.getElementById('title').offsetWidth) + 50) +"px";
    }
</script>

@endsection