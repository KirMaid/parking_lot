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
        $car = DB::table('cars')->where('id','=',$id)->first();
        $client = DB::table('clients')->where('id','=',$car->client_id)->first();

        //dd($client);

        if ($client != null)
            return view('pages.edit',compact('client','car'));
        else
            return abort(404);
    }

    public function editClient($carId)
    {
        //dd($car);
        //$clientId = $car->client_id;
        //$carId = $car->id;
        $clientId = DB::table('cars')->where('id','=',$carId)->first()->client_id;
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
        $searchPhoneNumberDuplicate =  DB::table('clients')->where('phone_number','=',$data['phone_number'])->first();
        $searchCarNumberDuplicate =  DB::table('cars')->where('state_number','=',$data['state_number'])->first();

        if ($searchPhoneNumberDuplicate != null){
            //dd($searchPhoneNumberDuplicate->id);
            if ($searchPhoneNumberDuplicate->id !=$clientId){
                return redirect()->back()->with('error','Клиент с таким номером уже существует');
            }
        }

        if ($searchCarNumberDuplicate != null){
            //dd($searchCarNumberDuplicate->id);
            if ($searchCarNumberDuplicate->id !=$carId){
                return redirect()->back()->with('error','Автомобиль с таким номером уже существует');
            }
        }

        DB::table('clients')->where('id','=',$clientId)->update([
            'full_name'=>$data['full_name'],
            'phone_number'=>$data['phone_number'],
            'gender'=>$data['gender'],
            'address'=>$data['address']]);
        DB::table('cars')->where('id','=',$carId)->update([
            'brand'=>$data['brand'],
            'model'=>$data['model'],
            'state_number'=>$data['state_number'],
            'color'=>$data['color']]);
        return redirect()->back()->with('success','Данные успешно изменены');
        //return redirect()->route('index');
//        try {
//            DB::table('clients')->where('id','=',$clientId)->update([
//                'full_name'=>$data['full_name'],
//                'phone_number'=>$data['phone_number'],
//                'gender'=>$data['gender'],
//                'address'=>$data['address']]);
//            DB::table('cars')->where('id','=',$carId)->update([
//                'brand'=>$data['brand'],
//                'model'=>$data['model'],
//                'state_number'=>$data['state_number'],
//                'color'=>$data['color']]);
//            return redirect()->route('index');
//        }
//        catch (Exception $e){
//            redirect()->back()->with('error',$e->getMessage());
//        }


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
