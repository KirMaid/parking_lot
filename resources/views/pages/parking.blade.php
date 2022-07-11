@extends('layouts.main-layout')
@section('title','AddPage')
@section('content')
@include('alert')
    <form method="POST" action="{{route('parking.update')}}">
        @method('PUT')
        @csrf
        <h1 class="mt-3">Ввод автомобиля на стоянку</h1>
        <div class="form-group mb-3">
            <label class="mb-1">Клиенты</label>
            <select class="form-control" name = "clientSelect">
                <option selected>Выбор клиента</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->full_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label class="mb-1">Автомобили</label>
            <select class="form-control" name="carSelect">
                <option selected>Выбор автомобиля</option>
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="option1">
            <label class="form-check-label" for="flexRadioDefault1">
                Автомобиль на стоянке
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="option2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Автомобиль не на стоянке
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(function () {
            clientSelect = $('select[name="clientSelect"]');
            carSelect = $('select[name="carSelect"]');
            carSelect.attr('disabled','disabled')

            carSelect.change(function(){
                var id = $(this).val();
                if(!id){
                    carSelect.attr('disabled','disabled')
                }
            })

            clientSelect.change(function() {
                var id= $(this).val();
                if(id){
                    carSelect.attr('disabled','disabled')

                    $.get('{{url('/parking-data?cat_id=')}}'+id)
                        .success(function(data){
                            var s='<option value="">Выбор автомобиля</option>';
                            console.log(data);
                            Array.from(data.data).forEach(row=>{
                                s +='<option value="' + row.id + '">' + row.brand + ' ' + row.model + ' ' + row.state_number + '</option>'
                            })
                            carSelect.removeAttr('disabled')
                            carSelect.html(s);
                        })
                }

            })
        })
    </script>
@endsection
