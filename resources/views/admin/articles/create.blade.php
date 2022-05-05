@extends('layouts.admin')

@section('back_button')
   <div class="container">
       <div class="py-2">
           <a class="btn btn-success btn-sm d-inline-flex align-items-center" href="../articles">
               <span class="material-symbols-outlined fs-6">
arrow_back_ios_new
</span>
               <span class="mx-2">Назад</span>
           </a>
       </div>
   </div>
@endsection

@section('content')
    <div class="container">
        <form class="row g-3">
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Название</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Описание (превью):</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Текст статьи</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-12">
                <label for="inputState" class="form-label">Видимость</label>
                <select id="inputState" class="form-select">
                    <option selected>Видимая</option>
                    <option>Скрытая</option>
                </select>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
