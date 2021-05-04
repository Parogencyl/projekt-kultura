<?php
    $kursy = DB::table('kursy')->get();

    $nauczysz = array();
    if(count($kursy)) {
        for ($i=0; $i < count($kursy); $i++) { 
            $nauczysz[$i] = explode('|', $kursy[$i]->czego_sie_nauczysz);
        }
    }

    $mainVideo = null;
    if($files = File::allFiles(public_path('graphics'))){
        for ($i=0; $i < count($files); $i++) { 
            if ($files[$i]->getFilename() == 'szkoleniaReklama.mp4') {
                $mainVideo =  true;
            }
        }
    }

    class Wariant {
        public $wariant1;
        public $wariant2;
        public $wariant3;
    }

    $warianty = array();
    $wariantySize = array();

    foreach ($kursy as $item) {
        $wariant = New Wariant();
        $text = array();
        if ($item->wariant1 == null) {
            $wariant->wariant1 = null;
        }else if(strpos($item->wariant1, '|')){
            $war = $item->wariant1;
            for ($i=0; $i < substr_count($item->wariant1, '|')+1; $i++) { 
                $pos = strpos($war, '|');
                $text[] = substr($war, $pos);
                $war = str_replace($war, '', 0, $pos);
            }
            $wariant->wariant1 = $text;
        }else {
            $wariant->wariant1 = $item->wariant1;
        }

        if ($item->wariant2 == null) {
            $wariant->wariant2 = null;
        }else if(strpos($item->wariant2, '|')){
            $war = $item->wariant2;
            for ($i=0; $i < substr_count($item->wariant2, '|')+1; $i++) { 
                $pos = strpos($war, '|');
                $text[] = substr($war, $pos);
                $war = str_replace($war, '', 0, $pos);
            }
            $wariant->wariant2 = $text;
        }else {
            $wariant->wariant2 = $item->wariant2;
        }

        if ($item->wariant3 == null) {
            $wariant->wariant3 = null;
        }else if(strpos($item->wariant3, '|')){
            $war = $item->wariant3;
            for ($i=0; $i < (substr_count($item->wariant3, '|')+1); $i++) { 
                $pos = strpos($war, '|'); 
                if($pos === false){
                    $text[] = substr($war, 0);
                    $war = substr_replace($war, '', 0, $pos+1);
                }else {
                    $text[] = substr($war, 0, $pos);
                    $war = substr_replace($war, '', 0, $pos+1);
                }
            }
            $wariant->wariant3 = $text;
        }else {
            $wariant->wariant3 = $item->wariant3;
        }

        $size = 0;
        if($item->wariant1 != null){
            $size = substr_count($item->wariant1, '|')+1;
        }
        if ($item->wariant2 != null) {
            if (substr_count($item->wariant2, '|')+1 > $size) {
                $size = substr_count($item->wariant2, '|')+1;
            }
        }
        if ($item->wariant3 != null) {
            if (substr_count($item->wariant3, '|')+1 > $size) {
                $size =substr_count($item->wariant3, '|')+1;
            }
        }
        
        $wariantySize[] = $size;
        $warianty[] = $wariant; 
    }



?>



@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/szkolenia.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&display=swap" rel="stylesheet">

<section class="container mb-5 mt-5">

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-inline-block my-5 px-4">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <h1 class="font-weight-bold text-center mb-3 font-italic" style="font-family: 'Lora', serif;"> SZKOLENIA </h1>

    <h4 class="text-center mb-5" style="font-family: 'Lora', serif;"> Stowarzyszenie Inicjatyw Społecznych „PROJEKT
        KULTURA” zaprasza do udziału w
        szkoleniach dla kadr kultury i organizacji pozarządowych.
    </h4>

    @if ($mainVideo)

    <div class="row justify-content-center">

        <div class="col-lg-6 col-md-8 col-11 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload" style="object-fit: cover"
                disablePictureInPicture poster='{{ asset('/graphics/Logo.png') }}'
                src="{{ asset('/graphics/szkoleniaReklama.mp4') }}" type="video/mp4">
            </video>
        </div>

    </div>

    @endif

    <hr class="mb-5 mt-5">

    <p class="font-weight-bold text-danger d-none" style="font-size: 15px;"> Jeśli jeszcze nie posiadasz klucza dostępu
        zachęcamy do zakupu wybranego przez siebie kursu w naszym serwisie. </p>

    <h1 class="text-center font-weight-bold mt-0 mb-5 font-italic font-uppercase" style="font-family: 'Lora', serif;">
        DOSTĘPNE
        KURSY
    </h1>

    @foreach ($kursy as $item)
    <div class="lesson pt-3">
        <h2 class="font-weight-bold mb-0" style="font-family: 'Bitter', serif;"> {{ $item->nazwa }}
        </h2>
        <div class="row align-items-middle pt-3">
            <div class="col-md-8 col-12 pl-md-4 pl-3 align-self-center">
                <div style="font-size: 20px;"> <span class="font-weight-bold"> Czas kursu (h):
                    </span>
                    <span class="text-white bg-success numberCourse">

                        @if(substr(date('H', strtotime($item->laczny_czas)), 0, 1) == '0')
                        {{ substr(date('H', strtotime($item->laczny_czas)), -1) }}+
                        @else
                        {{ date('H', strtotime($item->laczny_czas)) }}+
                        @endif

                    </span> </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="row">
                    <h3 class="font-weight-bold text-success text-center col-12 pt-3 pt-sm-0" style="font-size: 30px;">
                        {{ $item->cena }} zł
                    </h3>
                    <a href="{{ url('/zakup'.'/'.$item->nazwa) }}" id="buy"
                        class="btn btn-lg btn-danger mt-1 mb-2 col-12"> Wykup
                        dostęp
                    </a>
                </div>
            </div>
        </div>


        <div id="plusy" class="mt-3">
            <h3 class="font-weight-bold mb-3" style="font-family: 'Bitter', serif;"> Czego się nauczysz? </h3>
            <div class="pl-3">
                @for ($i = 0; $i < count($nauczysz[$loop->index]); $i++)
                    <p> <i class="far fa-check-circle text-success"></i> <span class="font-weight-bold"
                            style="font-size: 17px">
                            {{ $nauczysz[$loop->index][$i] }} </span> </p>
                    @endfor
            </div>
        </div>

        <div class="row justify-content-center">
            <button type="button" class="btn btn-lg btn-dark kursShow" style="font-family: 'Bitter', serif;"> WIĘCEJ
            </button>
        </div>

        <div class="kursHide">

            <div class="py-5">
                <div class="row justify-content-center">

                    <div class="col-lg-5 col-md-8 col-11 mb-3">
                        <video width="100%" height="100%" controls controlsList="nodownload" style="object-fit: cover"
                            src="{{ asset('/graphics/kursy/'.$item->nazwa.'_zwiastun.mp4') }}" disablePictureInPicture
                            type="video/mp4">
                        </video>
                        <p class="text-center font-weight-bold mb-0" style="font-size: 19px"> Zwiastun kursu </p>
                    </div>

                </div>
            </div>

            <div class="row mb-2 mt-5">

                <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 shadow">
                        <h5 class="card-header font-weight-bold text-center" style="font-family: 'Bitter', serif;">
                            WARIANT I
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-normal text-center">Kurs w postaci filmu</li>
                            @if ($item->wariant1 == null)
                            @for ($i = 0; $i < $wariantySize[$loop->index]; $i++)
                                <li class="list-group-item font-weight-normal text-center"> X </li>
                                @endfor
                                @elseif (strpos($item->wariant1, '|'))
                                @for ($i = 0; $i < count($warianty[$loop->index]->wariant1); $i++) <li
                                        class="list-group-item font-weight-normal text-center">
                                        {{ $warianty[$loop->index]->wariant1[$i] }} </li>
                                    @endfor
                                    @else
                                    <li class="list-group-item font-weight-normal text-center"> {{ $item->wariant1 }}
                                    </li>
                                    @for ($i = 0; $i < $wariantySize[$loop->index]-1; $i++)
                                        <li class="list-group-item font-weight-normal text-center"> X </li>
                                        @endfor
                                        @endif
                                        <li class="list-group-item text-center text-danger"
                                            style="font-size: 22px; font-family: 'Bitter', serif;">
                                            {{ $item->cena }} zł </li>
                        </ul>
                        <div class="bg-danger h-100">
                            <a href="{{ url('/zakup'.'/'.$item->nazwa) }}"
                                class="btn btn-lg btn-danger w-100 h-100 font-weight-bold d-flex justify-content-center align-items-center"
                                style="font-family: 'Bitter', serif;"> WYKUP
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 shadow">
                        <h5 class="card-header font-weight-bold text-center" style="font-family: 'Bitter', serif;">
                            WARIANT II
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-normal text-center">Kurs w postaci filmu</li>
                            @if ($item->wariant2 == null)
                            @for ($i = 0; $i < $wariantySize[$loop->index]; $i++)
                                <li class="list-group-item font-weight-normal text-center"> X </li>
                                @endfor
                                @elseif (strpos($item->wariant2, '|'))
                                @for ($i = 0; $i < count($warianty[$loop->index]->wariant2); $i++) <li
                                        class="list-group-item font-weight-normal text-center">
                                        {{ $warianty[$loop->index]->wariant2[$i] }} </li>
                                    @endfor
                                    @else
                                    <li class="list-group-item font-weight-normal text-center"> {{ $item->wariant2 }}
                                    </li>
                                    @for ($i = 0; $i < $wariantySize[$loop->index]-1; $i++)
                                        <li class="list-group-item font-weight-normal text-center"> X </li>
                                        @endfor
                                        @endif
                                        <li class="list-group-item text-center text-danger"
                                            style="font-size: 22px; font-family: 'Bitter', serif;">
                                            {{ $item->cena2 }} zł </li>
                        </ul>
                        <div class="bg-danger h-100">
                            <a href="{{ url('/zakup'.'/'.$item->nazwa) }}"
                                class="btn btn-lg btn-danger w-100 h-100 font-weight-bold d-flex justify-content-center align-items-center"
                                style="font-family: 'Bitter', serif;"> WYKUP
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 shadow">
                        <h5 class="card-header font-weight-bold text-center" style="font-family: 'Bitter', serif;">
                            WARIANT III
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-normal text-center">Kurs w postaci filmu</li>
                            </li>
                            @if ($item->wariant3 == null)
                            @for ($i = 0; $i < $wariantySize[$loop->index]; $i++)
                                <li class="list-group-item font-weight-normal text-center"> X </li>
                                @endfor
                                @elseif (strpos($item->wariant3, '|'))
                                @for ($i = 0; $i < count($warianty[$loop->index]->wariant3); $i++) <li
                                        class="list-group-item font-weight-normal text-center">
                                        {{ $warianty[$loop->index]->wariant3[$i] }} </li>
                                    @endfor
                                    @else
                                    <li class="list-group-item font-weight-normal text-center"> {{ $item->wariant3 }}
                                    </li>
                                    @for ($i = 0; $i < $wariantySize[$loop->index]-1; $i++)
                                        <li class="list-group-item font-weight-normal text-center"> X </li>
                                        @endfor
                                        @endif
                                        <li class="list-group-item text-center text-danger"
                                            style="font-size: 22px; font-family: 'Bitter', serif;">
                                            {{ $item->cena3 }} zł </li>
                        </ul>
                        <div class="bg-danger h-100">
                            <a href="{{ url('/zakup'.'/'.$item->nazwa) }}"
                                class="btn btn-lg btn-danger w-100 font-weight-bold d-flex justify-content-center align-items-center"
                                style="font-family: 'Bitter', serif;"> WYKUP
                            </a>
                        </div>
                    </div>
                </div>

            </div>


            <h4 class="font-weight-bold mb-2 mt-5" style="font-family: 'Bitter', serif;"> Przejdź do kursu </h4>

            <form action="{{ url('/szkolenia/checkKey') }}" method="POST" class="form-inline mt-2 mb-1">
                @csrf
                <input type="hidden" name="name" value="{{$item->nazwa}}">
                <div class="form-group">
                    <input type="text" name="key" class="form-control" id="exampleInputEmail1"
                        placeholder="Klucz dostępu">
                </div>

                <button class="btn btn-success ml-4" style="font-family: 'Bitter', serif;"> Zatwierdź </button>
            </form>

            <small class="form-text text-muted mb-4"> Za pomocą klucza dostępu możliwe jest korzystanie z filmów
                szkoleniowych
                Projekt kultura. </small>
        </div>
    </div>

    @if ($loop->iteration < $loop->count)
        <hr class="mb-5 mt-5">
        @endif
        @endforeach


</section>

<script>
    for (let i = 0; i < document.getElementsByClassName('kursHide').length; i++) {
        $('.kursHide').hide();
        document.getElementsByClassName('kursShow')[i].addEventListener('click', () => {
            $('.kursHide').eq(i).show(1000);
            document.getElementsByClassName('kursShow')[i].style.display = 'none';
        });
    }

    $(document).ready(function(){
        $('video').bind('contextmenu',function() { return false; });
    });

</script>
@endsection