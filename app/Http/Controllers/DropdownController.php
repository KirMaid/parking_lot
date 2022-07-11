<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function index(){
        $clients = DB::table('clients')->get();
        return view('pages.parking',['clients' => $clients]);
    }

    public function data(Request $request){

        if($request->has('cat_id')){
            $clientId = $request->get('cat_id');
            $data = DB::table('cars')->where('client_id','=',$clientId)->get();
            //$data = json_decode($data);
            //$data = json($data);
            return ['success'=>true,'data'=>$data];
        }
    }

    public function update(Request $request){
        $onParking = (request()->input('flexRadioDefault')=='option1')?1:0;
        $carId = request()->input('carSelect');
        if ($carId !=null){
            DB::table('cars')->where('id','=',$carId)->update([
                'flag'=>$onParking
            ]);
            return back()->with('success','Статус автомобиля изменён');
            //return redirect()->route('index');
        }
        else{
            return back()->with('error','Введите автомобиль');
        }

        //dd(request()->input('carSelect'));
       // dd(request()->input('flexRadioDefault'));
    }


}
