@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="filters-wrapper">
            <div class="dropdown-block">
                <div class="dropdown-title">
                    <h6>Бюджет</h6>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="&test">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <div class="dropdown-block">
                <div class="dropdown-title">
                    <h6>Настроение</h6>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <div class="dropdown-block">
                <div class="dropdown-title">
                    <h6>Компания</h6>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <div class="dropdown-block">
                <div class="dropdown-title">
                    <h6>Вид отдыха</h6>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="places-wrapper pt-4 pb-4">
            <a href="places/9" class="place-card">
                <div class="place-card-image">
                    <img src="../../assets/images/banners/2.jpeg" alt="">
                </div>
                <div class="place-card-title">
                    <h4>Place title</h4>
                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                </div>
            </a>
            <a href="places/10" class="place-card">
                <div class="place-card-image">
                    <img src="../../assets/images/banners/2.jpeg" alt="">
                </div>
                <div class="place-card-title">
                    <h4>Place title</h4>
                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                </div>
            </a>
            <a href="places/11" class="place-card">
                <div class="place-card-image">
                    <img src="../../assets/images/banners/2.jpeg" alt="">
                </div>
                <div class="place-card-title">
                    <h4>Place title</h4>
                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                </div>
            </a>
            <a href="places/12" class="place-card">
                <div class="place-card-image">
                    <img src="../../assets/images/banners/2.jpeg" alt="">
                </div>
                <div class="place-card-title">
                    <h4>Place title</h4>
                    <p>Place description Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                </div>
            </a>
        </div>
    </div>
@endsection

