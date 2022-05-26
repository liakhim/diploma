@extends('layouts.admin')

@section('back_button')
    <div class="container">
        <div class="py-2">
            <a class="btn btn-success btn-sm d-inline-flex align-items-center" href="../places">
               <span class="material-symbols-outlined fs-6">
arrow_back_ios_new
</span>
                <span class="mx-2">Назад</span>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <p>Новое место добавлено</p>
@endsection
