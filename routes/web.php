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

Route::middleware(['auth'])->group(function (){
    Route::get('/update-information','App\Http\Controllers\UserController@loadProfile');
    Route::post('update-information-action','App\Http\Controllers\UserController@updateProfileAction');
    Route::get('admin/squads','App\Http\Controllers\SquadController@getSquadList');
    Route::get('squad-swimmers','App\Http\Controllers\SquadController@getSwimmerList');
    Route::get('squad-update','App\Http\Controllers\SquadController@squadUpdate');
    Route::get('info','App\Http\Controllers\UserController@info');
    Route::post('squad-add-action','App\Http\Controllers\SquadController@squadUpdateAction');

    Route::get('admin/parents','App\Http\Controllers\UserController@getParentList');
    Route::get('admin/create-parent','App\Http\Controllers\UserController@createParent');
    Route::post('admin/create-parent-action','App\Http\Controllers\UserController@createParentAction');

    Route::get('admin/coaches','App\Http\Controllers\UserController@getCoachesList');
    Route::get('admin/create-coach','App\Http\Controllers\UserController@createCoach');
    Route::post('admin/create-coach-action','App\Http\Controllers\UserController@createCoachAction');

    Route::get('galas','App\Http\Controllers\GalaController@getGalaList');
    Route::get('add-gala','App\Http\Controllers\GalaController@addGala');
    Route::post('add-gala-action','App\Http\Controllers\GalaController@addGalaAction');

    Route::get('events','App\Http\Controllers\EventController@getEventList');
    Route::get('add-event','App\Http\Controllers\EventController@addEvent');
    Route::post('add-event-action','App\Http\Controllers\EventController@addEventAction');


});

Route::middleware(['roleGate:SuperAdmin'])->group(function (){
    Route::get('/teams','App\Http\Controllers\SquadController@teams');
});

Route::middleware(['roleGate:SuperAdmin','roleGate:coach'])->group(function (){

});

Route::middleware(['roleGate:SuperAdmin','roleGate:swimmer'])->group(function(){

});










