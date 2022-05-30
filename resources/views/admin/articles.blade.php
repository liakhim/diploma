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
            <p>Группы мест</p>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">-</th>
                    <th scope="col">id</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                    <tr @class(['table-success' => $article->visibility])>
                        <th>
                            <div style="width: 70px; height: 44px;overflow: hidden">
                                <img style="width: 100%" src="/storage/articles/{{$article->image_url}}" alt="">
                            </div>
                        </th>
                        <th scope="row">{{$article->id}}</th>
                        <td>{{$article->author}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->description}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>
                            <a href="/admin/articles/edit/{{$article->id}}" class="btn btn-warning btn-sm d-inline-flex align-items-center"
                                    title="Редактировать"
                            >
                                <span class="material-symbols-outlined fs-6">
                                    settings_suggest
                                </span>
                            </a>
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
        <a href="articles/create" class="btn btn-primary">Добавить статью</a>
    </div>
@endsection
