<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PlanController;

use App\Http\Controllers\BuildPlanController;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'loginPost'])->name('login.post');

Route::get('/registration',[AuthenticationController::class,'registration'])->name('registration');
Route::post('/registration', [AuthenticationController::class, 'registrationPost'])->name('registration.post');
Route::get('/viewMeals', [MealController::class, 'meals'])->name('viewMeals');


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


Route::get('/meals', [MealController::class , 'index' ])->name('meals.index');
Route::get('/meals/{meal}', [MealController::class , 'show' ])->name('meals.show');Route::get('/mealscreate', [MealController::class , 'create' ])->name('meals.create');
Route::post('/meals',[MealController::class , 'store' ])->name('meals.store');
Route::get('/meals/{meal}/edit', [MealController::class , 'edit' ])->name('meals.edit');
Route::put('/meals/{meal}', [MealController::class , 'update' ])->name('meals.update');
Route::delete('/meals/{meal}', [MealController::class , 'destroy' ])->name('meals.destroy');

Route::get('/plans', [PlanController::class , 'index' ])->name('plans.index');
Route::get('/plans/{plan}', [PlanController::class , 'show' ])->name('plans.show');
Route::get('/planscreate', [PlanController::class , 'create' ])->name('plans.create');
Route::post('/plans',[PlanController::class , 'store' ])->name('plans.store');
Route::get('/plans/{plan}/edit', [PlanController::class , 'edit' ])->name('plans.edit');
Route::put('/plans/{plan}', [PlanController::class , 'update' ])->name('plans.update');
Route::delete('/plans/{plan}', [PlanController::class , 'destroy' ])->name('plans.destroy');

