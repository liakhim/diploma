@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="place-wrapper">
            <div class="place-page">
                <div class="place-page-title">
                    <h2>Название места</h2>
                </div>
                <div class="place-page-content">
                    <div class="image">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="../../assets/images/banners/2.jpeg" alt="">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="../../assets/images/banners/2.jpeg" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../assets/images/banners/2.jpeg" alt="">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="info">
                        <div class="info-title">
                            <h6>Дополнительная информация:</h6>
                        </div>
                        <div class="info-rating">
                            <div>*****</div>
                        </div>
                    </div>
                </div>
                <div class="place-page-comments">
                    <div class="place-page-comments-title">
                        <h6>Отзывы о месте:</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

