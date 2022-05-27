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
                        <a href="/admin/places/edit/{{$location->id}}" class="btn btn-warning btn-sm d-inline-flex align-items-center"
                                title="Редактировать"
                        >
                                <span class="material-symbols-outlined fs-6">
                                    settings_suggest
                                </span>
                        </a>
                        <button class="btn btn-danger btn-sm d-inline-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
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
        <a href="/admin/places/create" class="btn btn-primary">Добавить место</a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
