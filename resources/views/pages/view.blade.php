@extends('layouts.main-layout')
@section('title','Main')
@section('content')
@include('alert')
    <h1 class="mt-3">Все клиенты</h1>
    <table class="table ">
        <tbody>
        <tr>
            <th>ФИО</th>
            <th>Авто</th>
            <th>Госномер</th>
            <th>Статус</th>
        </tr>
        @foreach($clientsAndCars as $clientAndCar)
            <tr>
                <td>{{$clientAndCar->full_name}}</td>
                <td>{{$clientAndCar->brand.' '.$clientAndCar->model}}</td>
                <td>{{$clientAndCar->state_number}}</td>
                <td>{{($clientAndCar->flag == 1)?'На стоянке':'Не на стоянке'}}</td>
                <td><a href={{route('edit.show',['id' => $clientAndCar->id])}}><i class="bi bi-pencil-square"></i></a></td>
                <form action="{{ route('destroy',['id' => $clientAndCar->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <td><button class="btn btn-link" style="font-size: 1rem;padding: 0;" type="submit"><i class="bi bi-x-square"></i></button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-5 mt-4 justify-content-between">
        {{$clientsAndCars->onEachSide(5)->links()}}
        <div>
            <a href="{{route('parking.index')}}" class="ms-auto"><button class="btn btn-primary">Ввод автомобиля на стоянку</button></a>
            <a href="{{route('add.index')}}" class="ms-auto"><button class="btn btn-primary">Добавить клиента</button></a>
        </div>
    </div>
    <h3 class="mt-3">Статистика по автомобилям на стоянке</h3>
    <table class="table ">
        <tbody>
            <tr>
                <th>Бренд</th>
                <th>Модель</th>
                <th>Кол-во автомобилей на стоянке</th>
            </tr>
            @foreach($carsStats as $carStats)
            <tr>
                <td>{{$carStats->brand}}</td>
                <td>{{$carStats->model}}</td>
                <td>{{$carStats->countModels}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
