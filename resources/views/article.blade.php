@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="article-wrapper">
            <div class="article-wrapper-image">
                <img src="/storage/articles/{{$article->image_url}}" alt="">
            </div>
            <div class="article-wrapper-title">
                <h3>{{$article->title}}</h3>
            </div>
            <div class="article-wrapper-content">
                {{$article->body}}
            </div>
        </div>
    </div>
@endsection
