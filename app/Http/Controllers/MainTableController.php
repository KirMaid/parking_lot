<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainTableController extends Controller
{
    public function index(){
        return view('pages.view');
    }
}
