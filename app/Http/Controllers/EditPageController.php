<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditPageController extends Controller
{
//    public function index($clientInformation){
//        return view('edit.view', ['clientInformation' => $clientInformation]);
//    }
    public function index(){
        return view('pages.edit');
    }
}
