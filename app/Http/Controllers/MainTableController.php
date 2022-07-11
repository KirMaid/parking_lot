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

        $carsStat = DB::table('cars')->select(array('brand','model',DB::raw('COUNT(*) as countModels')))->where('flag','=','1')->groupBy('model','brand')->orderBy('countModels','desc')->get();;
//        $clientsAndCars = DB::select('select * from clients
//        inner join cars
//        on clients.id = cars.client_id
//        order by clients.id')->paginate(5);
        return view('pages.view', ['clientsAndCars' => $clientsAndCars,'carsStats'=>$carsStat]);
//        $allCars = Car::all();
//        $allClients = Client::all();
    }

//    public function edit_page(){
//        return view('edit.view');
//    }


    public function destroy($id){
        DB::table('cars')->where('id','=',$id)->delete();
        //DB::table('clients')->where('id', '=',$id)->delete();
//        DB::table('cars')->where('client_id', '=',$id)->delete();
        return redirect()->back();
    }
}
