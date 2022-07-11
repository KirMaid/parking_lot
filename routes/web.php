<?php

use App\Http\Controllers\AddPageController;
use App\Http\Controllers\DropdownController;
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

Route::get('/', [MainTableController::class,'index'])->name('index');
Route::get('/parking',[DropdownController::class,'index'])->name('parking.index');
Route::get('/parking-data',[DropdownController::class,'data']);
Route::put('/parking',[DropdownController::class,'update'])->name('parking.update');
//Route::get('/edit',[EditPageController::class,'index'])->name('edit');
Route::get('/edit/{id}',[EditPageController::class,'index'])->name('edit.show');
Route::post('/edit/{id}',[EditPageController::class,'editClient'])->name('edit.store');
Route::get('/add',[AddPageController::class,'index'])->name('add.index');
Route::post('/add',[AddPageController::class,'insertClient'])->name('add.store');
Route::delete('/{id}',[MainTableController::class,'destroy'])->name('destroy');

//Route::resource('users','UserController');

