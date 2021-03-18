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
                $mainVideo[$i] =  true;
            }
        }
    }

?>

@extends('layouts.navAdmin')

@section('content')
<link href="{{ asset('css/szkolenia.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&display=swap" rel="stylesheet">

<section class="container mb-5 mt-5">

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-inline-block my-3 px-4">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-inline-block my-3 px-4">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    <h1 class="font-weight-bold text-center mb-3"> Szkolenia </h1>

    <h4 class="text-center mb-5"> Projekt kultura oferuje kursy szkoleniowe pozwalające na poszerzenie wiedzy w
        dziedzinie
        ...
    </h4>

    <div class="row justify-content-center">

        <div class="col-lg-6 col-md-8 col-11 mb-5">
            @if($mainVideo)
            <form action="/admin/deleteVideo" method="POST">
                @csrf
                <video width="100%" height="100%" controls controlsList="nodownload" disablePictureInPicture
                    style="object-fit: cover">
                    <source src="{{ asset('/graphics/szkoleniaReklama.mp4') }}"
                        type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                </video>
                <button type="submit" class="btn btn-lg btn-danger mb-3"> USUŃ FILM </button>
            </form>
            @else
            <form method="POST" action="/admin/addVideo" enctype="multipart/form-data">
                @csrf
                <input type="file" name="promo" class="mb-3">
                <button type="submit" class="btn btn-lg btn-success mb-3"> DODAJ FILM PROMOCYJNY </button>
            </form>
            <div class="progress">
                <div class="bar"></div>
                <div class="percent">0%</div>
            </div>
            @endif
            <p class="text-center font-weight-bold" style="font-size: 19px"> Nasza działalność </p>
        </div>

    </div>

    <hr class="mb-5 mt-5">

    <p class="font-weight-bold text-danger d-none" style="font-size: 15px;"> Jeśli jeszcze nie posiadasz klucza dostępu
        zachęcamy do zakupu wybranego przez siebie kursu w naszym serwisie. </p>

    <h1 class="text-center font-weight-bold mt-0 mb-5" style="font-family: ' Merriweather Sans', sans-serif;"> DOSTĘPNE
        KURSY
    </h1>

    @foreach ($kursy as $item)
    <div class="lesson">
        <h3 class="font-weight-bold mb-0" style="font-family: 'Merriweather Sans', sans-serif;">
            {{ $item->nazwa }}
        </h3>
        <div class="row align-items-middle pt-5">
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
                <p class="text-dark mt-2 mb-1"> <span class="font-weight-bold" style="font-size: 18px;">
                        Ostatnia
                        aktualizacja:</span>
                    {{ date('Y-m-d', strtotime($item->aktualizacja)) }} </p>
            </div>

            <div class="col-md-4 col-12">
                <div class="row">
                    <h3 class="font-weight-bold text-success text-center col-12" style="font-size: 30px;">
                        {{ $item->cena }} zł
                    </h3>
                    <a href="#" id="buy" class="btn btn-lg btn-danger mt-1 mb-2 col-12"> Wykup
                        dostęp
                    </a>
                </div>
            </div>
        </div>


        <div id="plusy" class="mt-4">
            <h4 class="font-weight-bold mb-3"> Czego się nauczysz? </h4>
            <div class="pl-3">
                @for ($i = 0; $i < count($nauczysz[$loop->index]); $i++)
                    <p> <i class="far fa-check-circle text-success"></i> <span class="font-weight-bold"
                            style="font-size: 17px">
                            {{ $nauczysz[$loop->index][$i] }} </span> </p>
                    @endfor
            </div>
        </div>

        <div class="row justify-content-center">
            <button type="button" class="btn btn-lg btn-dark kursShow"> WIĘCEJ </button>
        </div>

        <div class="kursHide">

            <div class="py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8 col-11 mb-3">
                        <video width="100%" height="100%" controls controlsList="nodownload" style="object-fit: cover"
                            disablePictureInPicture src="{{ asset('/graphics/kursy/'.$item->nazwa.'_zwiastun.mp4') }}"
                            type="video/mp4">
                        </video>
                        <p class="text-center font-weight-bold mb-0" style="font-size: 19px"> Zwiastun
                            kursu </p>
                    </div>
                </div>
            </div>

            <div class="row mb-2 mt-5">

                <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 shadow">
                        <h5 class="card-header font-weight-bold text-center">
                            WARIANT I
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-normal text-center">Kurs w postaci
                                filmu</li>
                            <li class="list-group-item font-weight-normal text-center"> X </li>
                            <li class="list-group-item font-weight-normal text-center"> X </li>
                            <li class="list-group-item text-center text-danger" style="font-size: 22px;">
                                {{ $item->cena }}zł </li>
                        </ul>
                        <div class="bg-danger h-100">
                            <a href="#"
                                class="btn btn-lg btn-danger w-100 h-100 d-flex justify-content-center align-items-center">
                                WYKUP </a>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 shadow">
                        <h5 class="card-header font-weight-bold text-center">
                            WARIANT II
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-normal text-center">Kurs w postaci
                                filmu</li>
                            <li class="list-group-item font-weight-normal text-center"> Odpowiedź na 3
                                dodatkowe pytania
                            </li>
                            <li class="list-group-item font-weight-normal text-center"> X </li>
                            <li class="list-group-item text-center text-danger" style="font-size: 22px;">
                                {{ $item->cena2 }}zł </li>
                        </ul>
                        <div class="bg-danger h-100">
                            <a href="#"
                                class="btn btn-lg btn-danger w-100 h-100 d-flex justify-content-center align-items-center">
                                WYKUP </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 shadow">
                        <h5 class="card-header font-weight-bold text-center">
                            WARIANT III
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-normal text-center">Kurs w postaci
                                filmu</li>
                            <li class="list-group-item font-weight-normal text-center"> Odpowiedź na 3
                                dodatkowe pytania
                            </li>
                            <li class="list-group-item font-weight-normal text-center"> Szczegółowa
                                analiza wniosku
                            </li>
                            <li class="list-group-item text-center text-danger" style="font-size: 22px;">
                                {{ $item->cena3 }}zł </li>
                        </ul>
                        <div class="bg-danger h-100">
                            <a href="#"
                                class="btn btn-lg btn-danger w-100 h-100 d-flex justify-content-center align-items-center">
                                WYKUP </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row justify-content-center">
            <a href="{{ url('/admin/edytuj_kurs/'.$item->nazwa) }}" class="btn btn-danger btn-lg mt-3 mb-4"> EDYTUJ KURS
            </a>
        </div>

        <div class="row justify-content-center">
            <a href="{{ url('/admin/kurs/'.$item->nazwa) }}" class="btn btn-success btn-lg mt-3 mb-4 text-uppercase">
                Przejdź do filmu głównego
            </a>
        </div>

        @if ($loop->iteration < $loop->count)
            <hr class="mb-5 mt-5">
            @endif
            @endforeach

            <div class="row justify-content-center my-5">
                <a href="{{ url('/admin/dodaj_kurs') }}" class="btn btn-success btn-lg"> DODAJ NOWY KURS
                </a>
            </div>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script type="text/javascript">
    var SITEURL = "{{URL('/')}}";
            $(function () {
                $(document).ready(function () {
                    var bar = $('.bar');
                    var percent = $('.percent');
                    $('form').ajaxForm({
                        beforeSend: function () {
                            var percentVal = '0%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        uploadProgress: function (event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        complete: function (xhr) {
                            alert('Proces został ukończony');
                            window.location.href = SITEURL + "/" + "admin/szkolenia";
                        }
                    });
                });
            });
</script>
@endsection