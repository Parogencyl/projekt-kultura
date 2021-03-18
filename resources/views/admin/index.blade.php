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

<div class="bilbord py-4 container py-0 mb-5 mt-3">

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="12000">
        <div class="carousel-inner">
            @if($baners != '[]')

            @if (isset($baners[0]))
            <div class="carousel-item active">
                <img src="{{ asset('/graphics/baners/'.$baners[0]) }}" class="d-block w-100" alt="Baner 1">
                @if (!isset($baners[1]))
                <div class="dustbin carousel-inner d-flex align-items-center justify-content-center">
                    <form action="{{ url('/admin/deleteBaner') }}" method="POST" class="m-2">
                        @csrf
                        <input type="text" name="file" value="1" class="d-none">
                        <button type="submit"> <i class="fas fa-trash-alt"> </i> </button>
                    </form>
                </div>
                @endif
            </div>

            @if (isset($baners[1]))
            <div class="carousel-item">
                <img src="{{ asset('/graphics/baners/'.$baners[1]) }}" class="d-block w-100" alt="Baner 2">
                @if (!isset($baners[2]))
                <div class="dustbin carousel-inner d-flex align-items-center justify-content-center">
                    <form action="{{ url('/admin/deleteBaner') }}" method="POST" class="m-2">
                        @csrf
                        <input type="text" name="file" value="2" class="d-none">
                        <button type="submit"> <i class="fas fa-trash-alt"> </i> </button>
                    </form>
                </div>
                @endif
            </div>

            @if (isset($baners[2]))
            <div class="carousel-item">
                <img src="{{ asset('/graphics/baners/'.$baners[2]) }}" class="d-block w-100" alt="Baner 3">
                <div class="dustbin carousel-inner d-flex align-items-center justify-content-center">
                    <form action="{{ url('/admin/deleteBaner') }}" method="POST" class="m-2">
                        @csrf
                        <input type="text" name="file" value="3" class="d-none">
                        <button type="submit"> <i class="fas fa-trash-alt"> </i> </button>
                    </form>
                </div>
            </div>

            @else

            <div class="carousel-item">
                <form action="{{ url('/admin/addBaner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="text-center border border-success py-5 image-upload bg-success carousel-inner d-flex align-items-center justify-content-center">
                        <label for="file-input3">
                            <i class="fas fa-plus text-white py-5" style="font-size: 80px;"></i>
                        </label>

                        <input type="text" name="el" value="3" class="d-none">

                        <input id="file-input3" type="file" name="baner" onchange="form.submit()">
                    </div>
                </form>
            </div>

            @endif

            @else

            <div class="carousel-item">
                <form action="{{ url('/admin/addBaner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="text-center border border-success py-5 image-upload bg-success carousel-inner d-flex align-items-center justify-content-center">
                        <label for="file-input2">
                            <i class="fas fa-plus text-white py-5" style="font-size: 80px;"></i>
                        </label>

                        <input type="text" name="el" value="2" class="d-none">

                        <input id="file-input2" type="file" name="baner" onchange="form.submit()">
                    </div>
                </form>
            </div>

            @endif

            @else

            <div class="carousel-item active">
                <form action="{{ url('/admin/addBaner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="text-center border border-success image-upload bg-success carousel-inner d-flex align-items-center justify-content-center">
                        <label for="file-input1">
                            <i class="fas fa-plus text-white py-5" style="font-size: 80px;"></i>
                        </label>

                        <input type="text" name="el" value="1" class="d-none">

                        <input id="file-input1" type="file" name="baner" onchange="form.submit()">
                    </div>
                </form>
            </div>

            @endif

            @else

            <div class="carousel-item active">
                <form action="{{ url('/admin/addBaner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="text-center border border-success py-5 image-upload bg-success carousel-inner d-flex align-items-center justify-content-center">
                        <label for="file-input1">
                            <i class="fas fa-plus text-white py-5" style="font-size: 80px;"></i>
                        </label>

                        <input type="text" name="el" value="1" class="d-none">

                        <input id="file-input1" type="file" name="baner" onchange="form.submit()">
                    </div>
                </form>
            </div>

            @endif

        </div>

        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>


<section class="container py-5">

    <h2 class="font-weight-bold text-center mb-5"> Aktualności na blogu </h2>

    <div class="row justify-content-center">
        <a href="{{ url('admin/dodaj_post') }}"
            class="text-center mb-5 col-xl-4 col-lg-5 col-md-6 col-10 p-5 bg-success">
            <i class="fas fa-plus text-white py-5" style="font-size: 80px;"></i>
        </a>
    </div>

    @if (count($posts))
    <div class="row w-xl-75 w-lg-100 mx-auto" id="main">

        @foreach ($posts as $post)
        <form action="/admin/goToPost" method="POST"
            class="d-flex align-items-stretch mb-4 col-xl-5 col-lg-5 col-md-6 col-10">
            @csrf
            <div class="card"> <input type="hidden" name="title" value="{{ $post->tytul }}">
                <button class="bg-white border-0 px-0" type="submit">
                    <div class="card-body pb-0">
                        <h4 class="card-title font-weight-bold mb-0 text-center pb-3"> {{ $post->tytul }} </h4>
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