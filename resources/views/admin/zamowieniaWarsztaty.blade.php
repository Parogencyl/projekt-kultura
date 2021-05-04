<?php

    $warsztaty = DB::table('kupione_warsztaty')->orderBy('id', 'DESC')->paginate(6);

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


<section class="py-5">

    <h2 class="font-weight-bold text-center mb-5"> Zamówienia warsztatów </h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"> Numer zamówienia </th>
                <th scope="col"> Kurs </th>
                <th scope="col"> Cena </th>
                <th scope="col"> Email </th>
                <th scope="col"> Osoba </th>
                <th scope="col"> Telefon </th>
                <th scope="col"> Zapłacono </th>
            </tr>
        </thead>
        <tbody>
            @foreach($warsztaty as $warsztat)
            <tr>
                <th scope="row">{{ $warsztat->id }}</th>
                <td>{{ $warsztat->numer_zamowienia }}</td>
                <td>{{ $warsztat->warsztat }}</td>
                <td>{{ $warsztat->cena }} zł</td>
                <td>{{ $warsztat->email }}</td>
                <td>{{ $warsztat->osoba }}</td>
                <td>{{ $warsztat->telefon }}</td>
                <td>{{ $warsztat->czy_zaplacono }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mx-auto mt-4 mb-4 font-weight-bold" id="pagination">
        {!! $warsztaty->render() !!}
    </div>

</section>


@endsection