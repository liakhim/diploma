@extends('layouts.admin')

@section('back_button')
    <div class="container">
        <div class="py-2">
            <a class="btn btn-success btn-sm d-inline-flex align-items-center" href="/">
                <span class="material-symbols-outlined fs-6">home</span>
                <span class="mx-2">На сайт</span>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Created</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($locations as $location)
                    <tr>
                    <th scope="row">{{$location->id}}</th>
                    <td>{{$location->name}}</td>
                    <td>{{$location->address}}</td>
                    <td>{{$location->rating}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm d-inline-flex align-items-center"
                                title="Редактировать"
                        >
                                <span class="material-symbols-outlined fs-6">
                                    settings_suggest
                                </span>
                        </button>
                        <button class="btn btn-danger btn-sm d-inline-flex align-items-center"
                                title="Удалить"
                        >
                            <span class="material-symbols-outlined fs-6">close</span>
                        </button>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="places/create" class="btn btn-primary">Добавить место</a>
    </div>
@endsection
