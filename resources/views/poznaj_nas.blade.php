@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/poznaj_nas.css') }}" rel="stylesheet">

<section class=" position-relative warsztatyDiv mb-4">
    <div class="bgImage" style="background-image: url({{ asset('/graphics/zespol2.jpg')}} )"> </div>
    <div class="darkening"> </div>
    <div class="position-absolute text-white warsztatTekst w-100" style="z-index: 10; bottom: 47%; font-size: 40px;">
        <div class="container">
            <div class="font-weight-bold font-italic text-center" style="font-family: 'Lora', serif;">
                POZNAJ NAS </div>
        </div>
    </div>
</section>

<section class="container mb-5 mt-5">

    <p class="text-justify"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo eligendi nesciunt quam hic
        magnam? Vero, vel
        laboriosam? Aperiam, veniam tenetur nostrum illum eius beatae eaque, vel harum tempore deserunt nam?
    </p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo eligendi nesciunt quam hic magnam? Vero, vel
        laboriosam? Aperiam, veniam tenetur nostrum illum eius beatae eaque, vel harum tempore deserunt nam?
    </p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo eligendi nesciunt quam hic magnam? Vero, vel
        laboriosam? Aperiam, veniam tenetur nostrum illum eius beatae eaque, vel harum tempore deserunt nam?
    </p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo eligendi nesciunt quam hic magnam? Vero, vel
        laboriosam? Aperiam, veniam tenetur nostrum illum eius beatae eaque, vel harum tempore deserunt nam?
    </p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo eligendi nesciunt quam hic magnam? Vero, vel
        laboriosam? Aperiam, veniam tenetur nostrum illum eius beatae eaque, vel harum tempore deserunt nam?
    </p>

</section>

@endsection