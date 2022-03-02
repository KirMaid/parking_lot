<?php

use App\Http\Controllers\AddPageController;
use App\Http\Controllers\EditPageController;
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
Route::get('/edit',[EditPageController::class,'index'])->name('edit');
Route::get('/add',[AddPageController::class,'index'])->name('add');
Route::get('/delete/{id}',[MainTableController::class,'delete_client'])->name('delete');



