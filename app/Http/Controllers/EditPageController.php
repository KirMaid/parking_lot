<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class EditPageController extends Controller
{
//    public function index($clientInformation){
//        return view('edit.view', ['clientInformation' => $clientInformation]);
//    }
    public function index(int $id){
        $client = DB::table('clients')->where('id','=',$id)->first();
        $cars = DB::table('cars')->where('client_id','=',$id)->get();
        //dd($client);
//        return view('pages.edit',['client' => $client,'cars' => $cars]);
        if ($client != null)
            return view('pages.edit',compact('client','cars'));
        else
            return abort(404);
    }

    public function editClient(int $id)
    {
        $data = request()->validate([
            'full_name'=>'string|required',
            'phone_number'=>'int|required',
            'gender'=>'string|required',
            'address'=>'string|required',
        ]);
        try {
            DB::table('clients')->where('id','=',$id)->update([
                'full_name'=>$data['full_name'],
                'phone_number'=>$data['phone_number'],
                'gender'=>$data['gender'],
                'address'=>$data['address']]);
            return redirect()->route('home');
        }
        catch (Exception $e){
            redirect()->back()->with('error',$e->getMessage());
        }


//        $clientNumberExist = DB::table('clients')->where('phone_number','=',$data['phone_number'])->first();
//        //dd($clientNumberExist);
//        $carNumberExist = DB::table('cars')->where('state_number','=',$data['state_number'])->first();
//        //dd($clientNumberExist);
//        if ($clientNumberExist == null){
//            if ($carNumberExist == null){
//                $clientId = DB::table('clients')->insertGetId([
//                    'full_name' => $data['full_name'],
//                    'phone_number'=> $data['phone_number'],
//                    'gender'=> $data['gender'],
//                    'address'=> $data['address'],
//                ]);
//
//                DB::table('cars')->insert([
//                    'brand'=>$data['brand'],
//                    'model'=>$data['model'],
//                    'color'=>$data['color'],
//                    'state_number'=>$data['state_number'],
//                    'flag'=> 1,
//                    'client_id'=> $clientId,
//                ]);
//
//                return redirect()->route('home');
//            }
//            else{
//                return back()->with('error','Автомобиль с таким госномером уже существует');
//            }
//        }
//        else{
//            return back()->with('error','Клиент с таким номером телефона уже существует');
//        }
    }
}
