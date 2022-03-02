@extends('layouts.main-layout')
@section('title','AddPage')
@section('content')
    <div class="row mt-5">
        <div class="col">
            <h2 class="mb-3">Данные клиента</h2>
            <h3 class="mb-2 mt-2">Фио</h3>
            <input type="text" class="form-control">
            <h3 class="mb-2 mt-2">Номер телефона</h3>
            <input type="text" class="form-control">
            <h3 class="mb-2 mt-2">Пол</h3>
            <input type="text" class="form-control">
            <h3 class="mb-2 mt-2">Адрес</h3>
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <h2 class="mb-3">Данные о автомобиле</h2>
            <h3 class="mb-2 mt-2">Бренд</h3>
            <input type="text" class="form-control">
            <h3 class="mb-2 mt-2">Модель</h3>
            <input type="text" class="form-control">
            <h3 class="mb-2 mt-2">Госномер</h3>
            <input type="text" class="form-control">
            <h3 class="mb-2 mt-2">Цвет</h3>
            <input type="text" class="form-control">
        </div>
    </div>


@endsection
