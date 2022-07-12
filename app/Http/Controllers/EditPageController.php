<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class EditPageController extends Controller
{
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
            if ($searchPhoneNumberDuplicate->id !=$clientId){
                return redirect()->back()->with('error','Клиент с таким номером уже существует');
            }
        }

        if ($searchCarNumberDuplicate != null){
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
    }

    public function destroy($id){
        $car = DB::table('cars')->where('id', '=',$id)->first();
        DB::table('clients')->where('id', '=',$car->client_id)->delete();
        return redirect()->route('index');
    }
}
