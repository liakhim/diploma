@extends('layouts.admin')

@section('content')
    <div class="container">
        Пользователи
        @foreach ($users as $user)
            <p>This is user {{ $user->id }} with name {{$user->name}}</p>
        @endforeach
    </div>
@endsection
