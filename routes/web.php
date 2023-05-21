<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControl;
use App\Http\Controllers\adminControl;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SaveData;
use App\Http\Controllers\chart;


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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/",[homeControl::class,"index"]);
Route::get("/users",[adminControl::class,"user"]);
Route::get("/deleteuser/{id}",[adminControl::class,"deleteuser"]);
Route::get("/redirect",[homeControl::class,"redirectFunct"]);
Route::get("/bacasuhu",[DataController::class,"bacasuhu"]);
Route::get("/bacatempat",[DataController::class,"bacatempat"]);
Route::get("/simpan/{distanceval}/{placeval}",[DataController::class,"simpansensor"]);
Route::get("/save/{valuedistance}/{place}",[SaveData::class,"simpansensor"]);
Route::get("/chart",[chart::class,"graph"]);






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
