<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainTableController extends Controller
{
    public function index(){
        $clientsAndCars = DB::table('clients')
            ->join('cars', 'clients.id', '=', 'cars.client_id')
            ->select('clients.*', 'cars.*')
            ->simplePaginate(5);
//        $clientsAndCars = DB::select('select * from clients
//        inner join cars
//        on clients.id = cars.client_id
//        order by clients.id')->paginate(5);
        return view('pages.view', ['clientsAndCars' => $clientsAndCars]);
//        $allCars = Car::all();
//        $allClients = Client::all();
    }

//    public function edit_page(){
//        return view('edit.view');
//    }


    public function destroy($id){
        DB::table('cars')->where('client_id','=',$id)->delete();
        //DB::table('clients')->where('id', '=',$id)->delete();
//        DB::table('cars')->where('client_id', '=',$id)->delete();
        return redirect()->back();
    }
}
