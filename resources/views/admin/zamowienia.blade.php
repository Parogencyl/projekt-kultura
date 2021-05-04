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

    <div class="row justify-content-center">
        <a href="/admin/zamowienia/kursy" class="btn btn-lg btn-dark mx-auto"> Zamówienia kursów </a>
    </div>

    <div class="row justify-content-center">
        <a href="/admin/zamowienia/warsztaty" class="btn btn-lg btn-dark my-5"> Zamówienia warsztatów </a>
    </div>
</section>


@endsection