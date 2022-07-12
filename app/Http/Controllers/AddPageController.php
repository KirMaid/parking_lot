<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddPageController extends Controller
{
    public function index(){
        $clients = DB::table('clients')->simplePaginate(5);
        //dd($clients);
        return view('pages.add',['clients' => $clients]);
    }

    public function insertClient()
    {
        if (request()->input('addCar')){
            $data = request()->validate([
                'phone_number'=>'required|int',
                'brand'=>'required|string',
                'model'=>'required|string',
                'state_number'=>'required|string',
                'color'=>'required|string',
            ]);
        }
        else{
            $data = request()->validate([
                'full_name'=>'required|string',
                'phone_number'=>'required|int',
                'gender'=>'required|string',
                'address'=>'required|string',
                'brand'=>'required|string',
                'model'=>'required|string',
                'state_number'=>'required|string',
                'color'=>'required|string',
            ]);
        }

//        if ($data->fails()){
//            return back()->with('error','Ошибка валидации: проверьте правильность заполнения полей');
//        }

        $clientNumberExist = DB::table('clients')->where('phone_number','=',$data['phone_number'])->first();
        //dd($clientNumberExist);
        $carNumberExist = DB::table('cars')->where('state_number','=',$data['state_number'])->first();
        //dd($clientNumberExist);
        if ($clientNumberExist == null){
            if ($carNumberExist == null){
                $clientId = DB::table('clients')->insertGetId([
                    'full_name' => $data['full_name'],
                    'phone_number'=> $data['phone_number'],
                    'gender'=> $data['gender'],
                    'address'=> $data['address'],
                ]);
                DB::table('cars')->insert([
                    'brand'=>$data['brand'],
                    'model'=>$data['model'],
                    'color'=>$data['color'],
                    'state_number'=>$data['state_number'],
                    'flag'=> (request()->input('flag') == true)?1:0,
                    'client_id'=> $clientId,
                ]);

                //return redirect()->route('index');
                return redirect()->back()->with('success','Клиент и автомобиль успешно добавленны');
            }
            else{
                return back()->with('error','Автомобиль с таким госномером уже существует');
            }
        }
        else{
            if (request()->input('addCar')){
                    if ($carNumberExist){
                        return back()->with('error','Автомобиль с таким госномером уже существует');
                    }
                    else{
                        DB::table('cars')->insert([
                            'brand'=>$data['brand'],
                            'model'=>$data['model'],
                            'color'=>$data['color'],
                            'state_number'=>$data['state_number'],
                            'flag'=> (request()->input('flag') == true)?1:0,
                            'client_id'=> $clientNumberExist->id,
                        ]);
                        //return redirect()->route('index');
                        return redirect()->back()->with('success','Автомобиль успешно добавлен');
                    }
            }
            return back()->with('error','Клиент с таким номером телефона уже существует');
        }
    }
}
