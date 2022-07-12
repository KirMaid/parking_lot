@extends('layouts.main-layout')
@section('title','AddPage')
@section('content')
@include('alert')

<form action="{{route('add.store')}}" method="post">
    @csrf
    <div class="row mt-5">
        <div class="col">
            <h2 class="mb-3">Данные клиента</h2>
            <h3 class="mb-2 mt-2">Фио</h3>
            <input type="text" class="form-control" name = "full_name">
            @error('full_name')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <h3 class="mb-2 mt-2">Номер телефона</h3>
            <input type="text" class="form-control" name = "phone_number" >
            @error('phone_number')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <h3 class="mb-2 mt-2">Пол</h3>
            <input type="text" class="form-control" name = "gender" >
            @error('gender')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <h3 class="mb-2 mt-2">Адрес</h3>
            <input type="text" class="form-control" name = "address">
            @error('address')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">Сохранить</button>
        </div>
        <div class="col">
            <h2 class="mb-3">Данные о автомобиле</h2>
            <h3 class="mb-2 mt-2">Бренд</h3>
            <input type="text" class="form-control" name = "brand">
            @error('brand')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <h3 class="mb-2 mt-2">Модель</h3>
            <input type="text" class="form-control" name = "model">
            @error('model')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <h3 class="mb-2 mt-2">Госномер</h3>
            <input type="text" class="form-control" name = "state_number">
            @error('state_number')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <h3 class="mb-2 mt-2">Цвет</h3>
            <input type="text" class="form-control" name = "color">
            @error('color')
            <div class="small text-danger pt-1">
                {{$message}}
            </div>
            @enderror
            <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name = "flag">
                <label class="form-check-label" for="flexSwitchCheckDefault">На стоянке</label>
            </div>
            <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name = "addCar">
                <label class="form-check-label" for="flexSwitchCheckDefault">Добавить только машину (по номеру телефона)</label>
            </div>
        </div>
    </div>
</form>

<h2 class="mb-3 mt-5">Текущие клиенты</h2>
<table class="table ">
    <tbody>
    <tr>
        <th>ФИО</th>
        <th>Номер телефона</th>
        <th>Пол</th>
        <th>Адрес</th>
    </tr>
    @foreach($clients as $client)
        <tr>
            <td>{{$client->full_name}}</td>
            <td>{{$client->phone_number}}</td>
            <td>{{$client->gender}}</td>
            <td>{{$client->address}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex mb-3 mt-4">
    {{$clients->onEachSide(5)->links()}}
</div>
@endsection
