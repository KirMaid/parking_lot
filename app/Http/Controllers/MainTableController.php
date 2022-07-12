<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class MainTableController extends Controller
{
    public function index(){
        $clientsAndCars = DB::table('clients')
            ->join('cars', 'clients.id', '=', 'cars.client_id')
            ->select('clients.*', 'cars.*')->orderBy('cars.flag','desc')
            ->simplePaginate(5);

        $carsStat = DB::table('cars')->select(array('brand','model',DB::raw('COUNT(*) as countModels')))->where('flag','=','1')->groupBy('model','brand')->orderBy('countModels','desc')->get();
        return view('pages.view', ['clientsAndCars' => $clientsAndCars,'carsStats'=>$carsStat]);
    }


    public function destroy(int $id){
        $clientId = DB::table('cars')->where('id','=',$id)->select('client_id')->first();
        $countCars = DB::table('cars')->where('client_id','=',$clientId->client_id)->select(DB::raw('COUNT(*) as count'))->first();
        if($countCars->count == 1){
            DB::table('clients')->where('id','=',$clientId->client_id)->delete();
            return redirect()->back()->with('success','Клиент и Автомобиль успешно удалены');
        }
        else{
            DB::table('cars')->where('id','=',$id)->delete();
            return redirect()->back()->with('success','Автомобиль успешно удалён');
        }
    }
}
