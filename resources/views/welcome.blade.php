@extends('layouts.app')
@section('content')
    <div id="carouselExampleCaptions" class="carousel carousel-welcome slide" data-bs-ride="carousel">
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
    <div class="container news pt-3">
        <div class="news-title">
            <h3>Последние новости</h3>
        </div>
        <div class="card article-card">
            <div class="card-body article-card d-flex">
                <div class="article-card-image">
                    <img src="../assets/images/articles/2.jpeg" alt="">
                </div>
                <div class="article-card-text">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a class="btn btn-success custom-btn" href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="card article-card">
            <div class="card-body article-card d-flex">
                <div class="article-card-image">
                    <img src="../assets/images/articles/3.jpeg" alt="">
                </div>
                <div class="article-card-text">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a class="btn btn-success custom-btn" href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="card article-card">
            <div class="card-body article-card d-flex">
                <div class="article-card-image">
                    <img src="../assets/images/articles/2.jpeg" alt="">
                </div>
                <div class="article-card-text">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a class="btn btn-success custom-btn" href="#">Read more</a>
                </div>
            </div>
        </div>
    </div>
@endsection
