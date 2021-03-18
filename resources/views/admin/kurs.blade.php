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

    <h1 class="font-weight-bold text-center"> {{ $kurs->nazwa }} </h1>

    <h4 class="text-center mb-5 mt-4"> Poniżej znajduje się cały film szkoleniowy udostępniony dla ciebie.
    </h4>


    <div class="row justify-content-center mb-5">

        <div class="col-lg-5 col-md-6 col-12 mb-5">
            <video width="100%" height="100%" controls controlsList="nodownload">
                <source src="{{ asset('/graphics/kursy/'.$kurs->nazwa.'.mp4') }}" type="video/mp4">
            </video>
        </div>

    </div>

    <form action="{{ url('admin/dodaj_film') }}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="name" value="{{ $kurs->nazwa }}">
        <div class="form-group">
            <label for="file-input1" class="font-weight-bold">Wybierz główny film: </label>
            <input id="file-input1" type="file" name="video" required>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success btn-lg mr-4"> DODAJ / ZMIEŃ </button>
            <a href="{{ url('admin/szkolenia') }}" class="btn btn-dark btn-lg"> WRÓĆ </a>
        </div>
    </form>

    <div class="progress mt-4">
        <div class="bar"></div>
        <div class="percent">0%</div>
    </div>

</section>

<script>
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
                            alert('Proces został ukończony.');
                            window.location.href = SITEURL + "/" + "admin/szkolenia";
                        }
                    });
                });
            });
</script>

@endsection