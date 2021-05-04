<?php

    $kursy = DB::table('kupione')->leftJoin('klucze', 'kupione.numer_zamowienia', '=', 'klucze.zamowienie')->select('kupione.*', 'klucze.klucz', 'klucze.utworzone')->orderBy('id', 'DESC')->paginate(6);

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

    <h2 class="font-weight-bold text-center mb-5"> Zamówienia kursów </h2>

    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col"> Numer zamówienia </th>
                <th scope="col"> Kurs </th>
                <th scope="col"> Wariant </th>
                <th scope="col"> Klucz </th>
                <th scope="col"> Cena </th>
                <th scope="col"> Email </th>
                <th scope="col"> Osoba </th>
                <th scope="col"> Telefn </th>
                <th scope="col"> Potwierdzenie </th>
                <th scope="col"> Faktura </th>
                <th scope="col"> Zapłacono </th>
                <th scope="col"> Status klucza </th>
            </tr>
        </thead>
        <tbody>
            @foreach($kursy as $kurs)
            <tr class="text-center">
                <th scope="row">{{ $kurs->id }}</th>
                <td>{{ $kurs->numer_zamowienia }}</td>
                <td>{{ $kurs->kurs }}</td>
                <td>{{ $kurs->wariant }}</td>
                @if ($kurs->klucz != null)
                <td> {{ $kurs->klucz }} </td>
                @else
                <td> - </td>
                @endif
                <td>{{ $kurs->cena }} zł</td>
                <td>{{ $kurs->email }}</td>
                <td>{{ $kurs->osoba }}</td>
                <td>{{ $kurs->telefon }}</td>
                <td>{{ $kurs->potwierdzenie_platnosci }}</td>
                <td> {{ $kurs->firma .' | '. $kurs->nip . ' | '. $kurs->dane_firmy }}</td>
                <td>{{ $kurs->czy_zaplacono }}</td>
                @if ($kurs->klucz == null)
                <td>
                    <form action="/admin/generateKey" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $kurs->numer_zamowienia }}" name="zamowienie">
                        <button type="submit" class="btn btn-success"> Dodaj klucz </button>
                    </form>
                </td>
                @else
                @if (strtotime($kurs->utworzone) > strtotime('-10 day'))
                <td> <button class="btn btn-dark" type="button"> Klucz istnieje </button> </td>
                @else
                <td> <button class="btn btn-danger" type="button"> Klucz stracił ważność </button> </td>
                @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mx-auto mt-4 mb-4 font-weight-bold" id="pagination">
        {!! $kursy->render() !!}
    </div>

</section>


@endsection