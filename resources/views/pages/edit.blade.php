@extends('layouts.main-layout')
@section('title','EditPage')
@section('content')
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
            <button class="btn btn-primary mt-2">Сохранить</button>
        </div>
        <div class="col">
            <h2 class="mb-3">Добавить данные о автомобиле</h2>
            <h3 class="mb-2 mt-2">Бренд</h3>
            <input type="text" class="form-control" required>
            <h3 class="mb-2 mt-2">Модель</h3>
            <input type="text" class="form-control" required>
            <h3 class="mb-2 mt-2">Госномер</h3>
            <input type="text" class="form-control" required>
            <h3 class="mb-2 mt-2">Цвет</h3>
            <input type="text" class="form-control" required>
        </div>
{{--        <a href={{route('edit')}}></a>--}}
    </div>
    <h2 class="mb-3 mt-5">Текущие автомобили</h2>
    <table class="table ">
        <tbody>
        <tr>
            <th>Модель</th>
            <th>Цвет</th>
            <th>Госномер</th>
            <th>Статус автомобиля</th>
        </tr>
        @foreach($cars as $car)
            <tr>
                <td contenteditable>{{$car->brand.' '.$car->model}}</td>
                <td contenteditable>{{$car->color}}</td>
                <td contenteditable>{{$car->state_number}}</td>
                @if(($car->state_number) == 0)
                    <td contenteditable>Отсутствует</td>
                @else
                    <td contenteditable>На стоянке</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
