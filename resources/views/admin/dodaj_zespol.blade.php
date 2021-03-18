@extends('layouts.navAdmin')

@section('content')
<div class="container">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block col-12 my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>

<section class="container mb-5 mt-5">

    <h1 class="font-weight-bold text-center mb-3 text-uppercase"> Dodaj kurs </h1>

    <form action="{{ url('admin/dodaj_zespol') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nazwa zespolu"
                required>
        </div>

        <div class="form-group">
            <input class="form-control" name="title1" placeholder="Podtytuł 1" type="text" value="{{ old('title1') }}"
                required>
        </div>

        <div class="form-group">
            <textarea class="form-control" name="text1" rows="4" placeholder="Tekst do podtytułu 1"
                value="{{ old('title1') }}" required></textarea>
        </div>

        <div class="form-group">
            <input class="form-control" name="title2" placeholder="Podtytuł 2" type="text" value="{{ old('title2') }}">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="text2" rows="4" placeholder="Tekst do podytułu 2"
                value="{{ old('text2') }}"></textarea>
        </div>

        <div class="form-group">
            <input class="form-control" name="title3" placeholder="Podtytuł 3" type="text" value="{{ old('title3') }}">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="text3" rows="4" placeholder="Tekst do podytułu 2"
                value="{{ old('text3') }}"></textarea>
        </div>

        <div class="form-group">
            <label for="file-input1" class="font-weight-bold">Wybierz zdjęcie 1: </label>
            <input id="file-input1" type="file" name="zdjecie1">
        </div>

        <div class="form-group">
            <label for="file-input2" class="font-weight-bold">Wybierz zdjęcie 2: </label>
            <input id="file-input2" type="file" name="zdjecie2">
        </div>

        <div class="form-group">
            <label for="file-input3" class="font-weight-bold">Wybierz zdjęcie 3: </label>
            <input id="file-input3" type="file" name="zdjecie3">
        </div>

        <div class="form-group">
            <label for="file-input4" class="font-weight-bold">Wybierz zdjęcie 4: </label>
            <input id="file-input4" type="file" name="zdjecie4">
        </div>

        <div class="row justify-content-center">
            <a href="{{ url('/admin/zespoly') }}" class="btn btn-dark btn-lg mr-4"> WRÓĆ </a>
            <button type="submit" class="btn btn-lg btn-success mr-4"> DODAJ </button>
        </div>

    </form>

</section>

@endsection