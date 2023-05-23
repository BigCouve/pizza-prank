<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OccurrencesController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




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
Route::get('/', function (){
    return redirect('/login');
});

Route::resource('/login', LoginController::class)->except(['store']);
Route::post('/login', [LoginController::class, 'login']);
Route::resource('/register', RegisterController::class);


Route::middleware('auth')->group(function () {
    Route::resource('/home', HomeController::class);
    Route::get('/logout', [LogoutController::class, 'logout']);
    Route::get('/username-session', function(){
        $userId = Session::get('userId');
        return response()->json($userId);
    });
    Route::resource('/occurrence', OccurrencesController::class);
});

