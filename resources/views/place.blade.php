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
                        <div class="info-list">
                            <div class="info-list-line">
                                <div class="icon">
                                    <span class="material-symbols-outlined">schedule</span>
                                </div>
                                <div class="text">
                                    <p>Часы работы:</p>
                                    <span>{{$place_info->time_open}}:00 - {{$place_info->time_close}}:00</span>
                                </div>
                            </div>
                            <div class="info-list-line">
                                <div class="icon">
                                    <span class="material-symbols-outlined">home_pin</span>
                                </div>
                                <div class="text">
                                    <p>Адрес:</p>
                                    <span>{{$place_info->address}}</span>
                                </div>
                            </div>
                            <div class="info-list-line">
                                <div class="icon">
                                    <span class="material-symbols-outlined">phone_in_talk</span>
                                </div>
                                <div class="text">
                                    <p>Телефон:</p>
                                    <span>{{$place_info->phone}}</span>
                                </div>
                            </div>
                            <div class="info-list-line">
                                <div class="icon">
                                    <span class="material-symbols-outlined">attach_money</span>
                                </div>
                                <div class="text">
                                    <p>Средний чек:</p>
                                    <span>{{$place_info->budget}} руб</span>
                                </div>
                            </div>
                        </div>
{{--                        <div class="info-rating">--}}
{{--                            <div class="stars">--}}
{{--                                <span class="material-symbols-outlined green">star</span>--}}
{{--                                <span class="material-symbols-outlined green">star</span>--}}
{{--                                <span class="material-symbols-outlined">star</span>--}}
{{--                                <span class="material-symbols-outlined">star</span>--}}
{{--                                <span class="material-symbols-outlined">star</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                @if(count($comments))
                <div class="place-page-comments">
                    <div class="place-page-comments-title">
                        <h6>Отзывы о месте:</h6>
                    </div>
                    <div class="place-page-comments-content">
                        @foreach($comments as $comment)
                            <div class="comment-card">
                                <div class="comment-card-title">
                                    <p>{{$comment->title}}</p>
                                </div>
                                <div class="comment-card-rating">
                                    <div class="stars">
                                        @for ($i = 0; $i <   5; $i++)
                                            <span @class([
                                            'material-symbols-outlined',
                                            'green' => $comment->rating > $i
                                            ])>star</span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="comment-card-text">
                                    <p>{{$comment->body}}</p>
                                </div>
                                <div class="comment-card-name">
                                    <p>{{$comment->sign}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <add-comment class="mb-4"></add-comment>
            </div>
        </div>
    </div>
@endsection

