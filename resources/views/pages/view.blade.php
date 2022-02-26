@extends('layouts.main-layout')
@section('title','Main')
@section('content')
    <h1>Все клиенты</h1>
    <table class="table">
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><a href="{{url('/edit')}}"><i class="bi bi-pencil-square"></i></a></td>
            <td><a href="{{url('/add')}}"><i class="bi bi-x-square"></i></a></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td><a href="{{url('/edit')}}"><i class="bi bi-pencil-square"></i></a></td>
            <td><a href="{{url('/add')}}"><i class="bi bi-x-square"></i></a></td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td><a href="{{url('/edit')}}"><i class="bi bi-pencil-square"></i></a></td>
            <td><a href="{{url('/add')}}"><i class="bi bi-x-square"></i></a></td>
        </tr>
        </tbody>
    </table>
@endsection
