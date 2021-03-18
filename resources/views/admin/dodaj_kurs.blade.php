@extends('layouts.navAdmin')

@section('content')
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

    <h1 class="font-weight-bold text-center mb-3 text-uppercase"> Dodaj kurs </h1>

    <form action="{{ url('admin/dodaj_kurs') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nazwa kursu"
                required>
        </div>

        <div class="form-group">
            <input class="form-control" name="laczny_czas" placeholder="Czas kursu" type="time"
                value="{{ old('laczny_czas') }}" required>
        </div>

        <div class="input-group">
            <input class="form-control" type="text" name="price" placeholder="Cena - wariant I"
                value="{{ old('price') }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">zł</div>
            </div>
        </div>
        <small> Grosze należy podać po znaku . (199.99) </small>

        <div class="input-group">
            <input class="form-control" type="text" name="price2" placeholder="Cena - wariant II"
                value="{{ old('price2') }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">zł</div>
            </div>
        </div>
        <small> Grosze należy podać po znaku . (199.99) </small>

        <div class="input-group">
            <input class="form-control" type="text" name="price3" placeholder="Cena - wariant III"
                value="{{ old('price3') }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">zł</div>
            </div>
        </div>
        <small> Grosze należy podać po znaku . (199.99) </small>

        <div class="form-group">
            <textarea class="form-control" name="learn" rows="4"
                placeholder="Czego się nauczysz w kursie (każdy punkt odzielony znakiem | )" value="{{ old('learn') }}"
                required>{{ old('learn') }}</textarea>
        </div>

        <div class="form-group">
            <label for="file-input2" class="font-weight-bold">Wybierz zwiastun: </label>
            <input id="file-input2" type="file" name="videoZwiastun">
        </div>

        <div class="row justify-content-center">
            <a href="{{ url('/admin/szkolenia') }}" class="btn btn-dark btn-lg mr-4"> WRÓĆ </a>
            <button type="submit" class="btn btn-lg btn-success mr-4"> DODAJ </button>
        </div>

    </form>

</section>

@endsection