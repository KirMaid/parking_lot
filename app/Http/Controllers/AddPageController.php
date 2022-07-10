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
                'phone_number'=>'int|required',
                'brand'=>'string|required',
                'model'=>'string|required',
                'state_number'=>'string|required',
                'color'=>'string|required',
            ]);
        }
        else{
            $data = request()->validate([
                'full_name'=>'string|required',
                'phone_number'=>'int|required',
                'gender'=>'string|required',
                'address'=>'string|required',
                'brand'=>'string|required',
                'model'=>'string|required',
                'state_number'=>'string|required',
                'color'=>'string|required',
            ]);
        }

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

                return redirect()->route('index');
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
                        return redirect()->route('index');
                    }
            }
            return back()->with('error','Клиент с таким номером телефона уже существует');
        }
    }
}
