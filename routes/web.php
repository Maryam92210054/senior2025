<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\BuildPlanController;

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
Route::get('/build-plan', [BuildPlanController::class, 'index'])->middleware('auth')->name('build_plan');
Route::get('/choose-days/{plan}', [BuildPlanController::class, 'chooseDays'])->name('chooseDays');
Route::post('/process-plan-selection', [BuildPlanController::class, 'processPlanSelection'])->name('processPlanSelection');

Route::post('/store-user-meal-plan', [BuildPlanController::class, 'storeUserMealPlan'])->name('storeUserMealPlan');
Route::get('/user-meal-plan/{plan_id}', [BuildPlanController::class, 'showUserMealPlan'])->name('showUserMealPlan');
Route::post('/process-plan-days', [BuildPlanController::class, 'processPlanDays'])->name('processPlanDays');
Route::post('/store-user-meal-plan', [BuildPlanController::class, 'storeUserMealPlan'])->name('storeUserMealPlan');


Route::post('/store-days', [BuildPlanController::class, 'storeDays'])->name('storeDays');
Route::get('/choose-meals/{planId}', [BuildPlanController::class, 'chooseMeals'])->name('chooseMeals');
Route::post('/submit-plan', [BuildPlanController::class, 'submitPlan'])->name('submitPlan');



