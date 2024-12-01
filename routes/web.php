<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MealController;

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
Route::get('/viewMeals', [MealController::class, 'meals'])->name('viewMeals');

Route::get('/meals', [MealController::class , 'index' ])->name('meals.index');
Route::get('/meals/{meal}', [MealController::class , 'show' ])->name('meals.show');


