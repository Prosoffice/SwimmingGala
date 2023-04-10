<?php

use App\Models\Post;
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

Route::get('/','App\Http\Controllers\Authentication\LoginController@login');
Route::get('/login','App\Http\Controllers\Authentication\LoginController@login');
Route::post('/login-action','App\Http\Controllers\Authentication\LoginController@handleLogin');
Route::get('/logout','App\Http\Controllers\Authentication\LoginController@logout');
Route::get('/register','App\Http\Controllers\Authentication\RegisterController@register');
Route::post('/register-action','App\Http\Controllers\Authentication\RegisterController@handleRegister');
Route::get('/dashboard','App\Http\Controllers\HomeController@dashboard');
Route::get('/account','App\Http\Controllers\PersonalInfoController@account');

Route::middleware(['roleGate:SuperAdmin'])->group(function (){
    Route::get('/teams','App\Http\Controllers\SquadController@teams');
});

Route::middleware(['roleGate:SuperAdmin','roleGate:coach'])->group(function (){

});

Route::middleware(['roleGate:SuperAdmin','roleGate:swimmer'])->group(function(){

});










