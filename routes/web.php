<?php

use App\Http\Controllers\IndustriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndustriController::class,'index'])->name('industri.index');
Route::resource('industri', IndustriController::class)->except('index');
