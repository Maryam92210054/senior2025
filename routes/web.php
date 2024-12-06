<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MealController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'loginPost'])->name('login.post');

Route::get('/registration',[AuthenticationController::class,'registration'])->name('registration');
Route::post('/registration', [AuthenticationController::class, 'registrationPost'])->name('registration.post');
Route::get('/viewMeals', [MealController::class, 'meals'])->name('viewMeals');

Route::get('/meals', [MealController::class , 'index' ])->name('meals.index');
Route::get('/meals/{meal}', [MealController::class , 'show' ])->name('meals.show');
Route::get('/mealscreate', [MealController::class , 'create' ])->name('meals.create');
Route::post('/meals',[MealController::class , 'store' ])->name('meals.store');
Route::get('/meals/{meal}/edit', [MealController::class , 'edit' ])->name('meals.edit');
Route::put('/meals/{meal}', [MealController::class , 'update' ])->name('meals.update');
Route::delete('/meals/{meal}', [MealController::class , 'destroy' ])->name('meals.destroy');



