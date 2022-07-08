<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditPageController extends Controller
{
//    public function index($clientInformation){
//        return view('edit.view', ['clientInformation' => $clientInformation]);
//    }
    public function index(int $id){
        $client = DB::table('clients')->where('id','=',$id)->first();
        $cars = DB::table('cars')->where('client_id','=',$id)->get();
//        return view('pages.edit',['client' => $client,'cars' => $cars]);
        return view('pages.edit',compact('client','cars'));
    }
}
