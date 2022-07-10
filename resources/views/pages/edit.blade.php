@extends('layouts.main-layout')
@section('title','EditPage')
@section('content')
    <form action="{{route('edit.store',$client->phone_number)}}" method="post">
        @csrf
        <div class="row mt-5">
            <div class="col">
                <h2 class="mb-3">Данные клиента</h2>
                <h3 class="mb-2 mt-2">Фио</h3>
                <input type="text" class="form-control" value={{$client->full_name}} required>
                <h3 class="mb-2 mt-2">Номер телефона</h3>
                <input type="text" class="form-control" value={{$client->phone_number}} required>
                <h3 class="mb-2 mt-2">Пол</h3>
                <input type="text" class="form-control" value={{$client->gender}} required>
                <h3 class="mb-2 mt-2">Адрес</h3>
                <input type="text" class="form-control" value={{$client->address}} required>
                <button class="btn btn-primary mt-2" type="submit">Сохранить</button>
                <button class="btn btn-primary mt-2">Сохранить</button>
            </div>
            <div class="col">
                <h2 class="mb-3">Добавить автомобиль</h2>
                <h3 class="mb-2 mt-2" >Бренд</h3>
                <input type="text" class="form-control" name="brand">
                <h3 class="mb-2 mt-2">Модель</h3>
                <input type="text" class="form-control" name="model">
                <h3 class="mb-2 mt-2">Госномер</h3>
                <input type="text" class="form-control" name="state_number">
                <h3 class="mb-2 mt-2">Цвет</h3>
                <input type="text" class="form-control" name="color">
{{--                <div class="form-check form-switch mt-2">--}}
{{--                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name = "flag">--}}
{{--                    <label class="form-check-label" for="flexSwitchCheckDefault">На стоянке</label>--}}
{{--                </div>--}}
{{--                <div class="form-check form-switch mt-2">--}}
{{--                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name = "addCar">--}}
{{--                    <label class="form-check-label" for="flexSwitchCheckDefault">Добавить машину</label>--}}
{{--                </div>--}}
            </div>
    {{--        <a href={{route('edit')}}></a>--}}
        </div>
    </form>
    <h2 class="mb-3 mt-5">Текущие автомобили</h2>
    <table class="table ">
        <tbody>
        <tr>
            <th>Модель</th>
            <th>Цвет</th>
            <th>Госномер</th>
{{--            <th>Статус автомобиля</th>--}}
        </tr>
        @foreach($cars as $car)
            <tr>
                <td>{{$car->brand.' '.$car->model}}</td>
                <td>{{$car->color}}</td>
                <td>{{$car->state_number}}</td>
{{--                @if(($car -> flag) == 0)--}}
{{--                    <td>Отсутствует</td>--}}
{{--                @else--}}
{{--                    <td>На стоянке</td>--}}
{{--                @endif--}}
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
