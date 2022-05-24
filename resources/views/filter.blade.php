@extends('layouts.app')

@section('content')
<div class="container">
    <div class="filters-wrapper mt-4">
        <filters></filters>
    </div>
    <div class="container mt-5">
        <table class="table filter-table">
            <thead>
            <tr>
                <th scope="col">Название места</th>
                <th scope="col">Бюджет</th>
                <th scope="col">Компания</th>
                <th scope="col">Часы работы</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($places as $place)
                <tr>
                    <td>
                        <span>{{$place->name}}</span>
                    </td>
                    <td>
                        <span>{{$place->budget}}</span>
                    </td>
                    <td>
                        <span>{{$place->min_guest_quantity}}
                            @if($place->max_guest_quantity)
                                - {{$place->max_guest_quantity}}
                            @else
                                и более
                            @endif
                        </span>
                    </td>
                    <td>
                        @if($place->time_open == '0' && $place->time_close == '0')
                            <span>Круглосуточно</span>
                        @else
                            <span>{{$place->time_open}} - {{$place->time_close}}</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-link" href="#">Открыть</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
