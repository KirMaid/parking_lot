
@extends('layouts.main-layout')
@section('title','Main')
@section('content')
    <h1 class="mt-3">Все клиенты</h1>
{{--    @foreach($clientsAndCars as $clientAndCar)--}}
{{--    <p>{{$clientsAndCars}}</p>--}}
{{--    @endforeach--}}
{{--    @dump($clientsAndCars)--}}
    <table class="table ">
        <tbody>
        <tr>
            <th>ФИО</th>
            <th>Авто</th>
            <th>Госномер</th>
        </tr>
        @foreach($clientsAndCars as $clientAndCar)
            <tr>
                <td>{{$clientAndCar->full_name}}</td>
                <td>{{$clientAndCar->brand.' '.$clientAndCar->model}}</td>
                <td>{{$clientAndCar->state_number}}</td>
{{--                <td><a href="{{route('edit'),['clientInformation' => $clientAndCar]}}"><i class="bi bi-pencil-square"></i></a></td>--}}
                <td><a href={{route('edit.show',['id' => $clientAndCar->client_id])}}><i class="bi bi-pencil-square"></i></a></td>
                <form action="{{ route('destroy',['id' => $clientAndCar->client_id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <td><button class="btn btn-link" type="submit"><i class="bi bi-x-square"></i></button></td>
{{--                    <td><button class="btn-close" type="submit"></button></td>--}}
{{--                    <button type="submit" class="btn btn-outline-danger">Delete</button>--}}
                </form>
{{--                <td><a href={{route('destroy',['id' => $clientAndCar->client_id])}}><i class="bi bi-x-square"></i></a></td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-3 mt-4">
        {{$clientsAndCars->onEachSide(5)->links()}}
        <a href="{{route('add.index')}}" class="ms-auto"><button class="btn btn-primary">Добавить клиента</button></a>
    </div>
    <h1 class="mt-3">Ввод автомобиля на стоянку</h1>
    <div class="form-group mb-3">
        <label class="mb-1">Клиенты</label>
        <select class="form-control">
            <option selected>Выбор клиента</option>
            @foreach($clientsAndCars as $clientAndCar)
                <option value="{{$clientAndCar->client_id}}">{{$clientAndCar->full_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1">Автомобили</label>
        <select class="form-control">
            <option selected>Выбор автомобиля</option>
            @foreach($clientsAndCars as $clientAndCar)
                <option value="{{$clientAndCar->id}}">{{$clientAndCar->brand.' '.$clientAndCar->model}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
            Автомобиль на стоянке
        </label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Автомобиль не на стоянке
        </label>
    </div>
    <a href="{{route('add.index')}}" class="ms-auto"><button class="btn btn-primary">Сохранить</button></a>
@endsection
