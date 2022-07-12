@extends('layouts.main-layout')
@section('title','EditPage')
@section('content')
@include('alert')
    <form action="{{route('edit.store',$car->id)}}" method="post">
        @csrf
        <div class="row mt-5">
            <div class="col">
                <h2 class="mb-3">Данные клиента</h2>
                <h3 class="mb-2 mt-2">Фио</h3>
                <input type="textarea" class="form-control" name="full_name" value='{{$client->full_name}}'>
                @error('full_name')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
                <h3 class="mb-2 mt-2">Номер телефона</h3>
                <input type="text" class="form-control" name="phone_number" value='{{$client->phone_number}}'>
                @error('phone_number')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
                <h3 class="mb-2 mt-2">Пол</h3>
                <input type="text" class="form-control" name="gender" value='{{$client->gender}}'>
                @error('gender')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
                <h3 class="mb-2 mt-2">Адрес</h3>
                <input type="text" class="form-control" name="address" value='{{$client->address}}'>
                @error('address')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
                <button class="btn btn-primary mt-2" type="submit">Сохранить</button>
                <form action="{{ route('edit.destroy',['id' => $car->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger mt-2" type="submit">Удалить клиента</button>
                </form>
            </div>
            <div class="col">
                <h2 class="mb-3">Добавить автомобиль</h2>
                <h3 class="mb-2 mt-2" >Бренд</h3>
                <input type="text" class="form-control" name="brand" value='{{$car->brand}}' >
                @error('brand')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
                <h3 class="mb-2 mt-2">Модель</h3>
                <input type="text" class="form-control" name="model" value='{{$car->model}}'>
                @error('model')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
                <h3 class="mb-2 mt-2">Госномер</h3>
                <input type="text" class="form-control" name="state_number" value='{{$car->state_number}}'>
                @error('state_number')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
                <h3 class="mb-2 mt-2">Цвет</h3>
                <input type="text" class="form-control" name="color" value='{{$car->color}}'>
                @error('color')
                <div class="small text-danger pt-1">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
    </form>
@endsection
