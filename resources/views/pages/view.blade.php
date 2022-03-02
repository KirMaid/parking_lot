
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
        @foreach($clientsAndCars as $clientAndCar)
            <tr>
                <td>{{$clientAndCar->full_name}}</td>
                <td>{{$clientAndCar->brand.' '.$clientAndCar->model}}</td>
                <td>{{$clientAndCar->state_number}}</td>
{{--                <td><a href="{{route('edit'),['clientInformation' => $clientAndCar]}}"><i class="bi bi-pencil-square"></i></a></td>--}}
                <td><a href="{{route('edit')}}"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href={{route('delete',['id' => $clientAndCar->client_id])}}><i class="bi bi-x-square"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--        {{$clientsAndCars->links()}}--}}
    <div class="d-flex mb-5 mt-4">
        {{$clientsAndCars->onEachSide(5)->links()}}
        <a href="{{route('add')}}" class="ms-auto"><button class="btn ">Добавить клиента</button></a>
    </div>
    <div class="form-group mb-5">
        <label class="mb-1">Клиенты</label>
        <select class="form-control">
            <option selected>Выбор клиента</option>
            @foreach($clientsAndCars as $clientAndCar)
                <option value="{{$clientAndCar->client_id}}">{{$clientAndCar->full_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-5">
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
    <div class="form-check mb-5">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Автомобиль не на стоянке
        </label>
    </div>
@endsection
