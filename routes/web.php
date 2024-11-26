<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MealController;


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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/test', function () {
    return view('test');
})->name('test');



Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'loginPost'])->name('login.post');

Route::get('/registration',[AuthenticationController::class,'registration'])->name('registration');
Route::post('/registration', [AuthenticationController::class, 'registrationPost'])->name('registration.post');
Route::get('/meals', [MealController::class, 'meals'])->name('meals');

