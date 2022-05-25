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
                    <th scope="col">Author</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
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
    </div>
@endsection
