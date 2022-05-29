@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="places-wrapper pt-4 pb-4">
            @foreach ($places as $place)
                <a href="places/{{$place->id}}" class="place-card">
                    <div class="place-card-image">
                        <img src="/storage/locations/{{$place->image_url}}" alt="">
                    </div>
                    <div class="place-card-title">
                        <span>{{$place->group_id}}</span>
                        <h4>{{$place->name}}</h4>
                        <p>{{$place->description}}</p>
                    </div>
                </a>
            @endforeach
{{--            <a href="places/9" class="place-card">--}}
{{--                <div class="place-card-image">--}}
{{--                    <img src="../../assets/images/banners/2.jpeg" alt="">--}}
{{--                </div>--}}
{{--                <div class="place-card-title">--}}
{{--                    <h4>Place title</h4>--}}
{{--                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="places/10" class="place-card">--}}
{{--                <div class="place-card-image">--}}
{{--                    <img src="../../assets/images/banners/2.jpeg" alt="">--}}
{{--                </div>--}}
{{--                <div class="place-card-title">--}}
{{--                    <h4>Place title</h4>--}}
{{--                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="places/11" class="place-card">--}}
{{--                <div class="place-card-image">--}}
{{--                    <img src="../../assets/images/banners/2.jpeg" alt="">--}}
{{--                </div>--}}
{{--                <div class="place-card-title">--}}
{{--                    <h4>Place title</h4>--}}
{{--                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="places/12" class="place-card">--}}
{{--                <div class="place-card-image">--}}
{{--                    <img src="../../assets/images/banners/2.jpeg" alt="">--}}
{{--                </div>--}}
{{--                <div class="place-card-title">--}}
{{--                    <h4>Place title</h4>--}}
{{--                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>--}}
{{--                </div>--}}
{{--            </a>--}}
        </div>
    </div>
@endsection

