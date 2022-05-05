@extends('layouts.app')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="bg-dark" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image">
                    <img src="../assets/images/banners/1.jpeg" class="d-block w-100" alt="...">
                </div>
{{--                <div class="carousel-caption d-none d-md-block">--}}
{{--                    <h5>First slide label</h5>--}}
{{--                    <p>Some representative placeholder content for the first slide.</p>--}}
{{--                </div>--}}
            </div>
            <div class="carousel-item">
                <div class="image">
                    <img src="../assets/images/banners/2.jpeg" class="d-block w-100" alt="...">
                </div>
{{--                <div class="carousel-caption d-none d-md-block">--}}
{{--                    <h5>Second slide label</h5>--}}
{{--                    <p>Some representative placeholder content for the second slide.</p>--}}
{{--                </div>--}}
            </div>
            <div class="carousel-item">
                <div class="image">
                    <img src="../assets/images/banners/3.jpeg" class="d-block w-100" alt="...">
                </div>
{{--                <div class="carousel-caption d-none d-md-block">--}}
{{--                    <h5>Third slide label</h5>--}}
{{--                    <p>Some representative placeholder content for the third slide.</p>--}}
{{--                </div>--}}
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<div class="container">
    <div class="row row-cols-3">
        <div class="col d-flex flex-column align-items-center">
            <div class="card" style="width: 24rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col d-flex flex-column align-items-center">
            <div class="card" style="width: 24rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col d-flex flex-column align-items-center">
            <div class="card" style="width: 24rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
