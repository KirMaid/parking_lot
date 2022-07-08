<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddPageController extends Controller
{
    public function index(){
        return view('pages.add');
    }

    public function insertClient(){
        DB::table('users')->insert([
            'email' => 'kayla@example.com',
            'votes' => 0
        ]);
    }
}
