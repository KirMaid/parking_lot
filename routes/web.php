<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainTableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('pages.view');
//});

Route::get('/', [MainTableController::class,'index']);

Route::get('/add', function () {
    return view('pages.add');
});

Route::get('/edit', function () {
    return view('pages.edit');
});
