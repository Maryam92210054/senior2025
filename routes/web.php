<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\BuildPlanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewPlanController;
use App\Http\Controllers\PlanTypeController;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/test', function () {
    return view('test');
})->name('test');


Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'loginPost'])->name('login.post');
    Route::get('/registration',[AuthenticationController::class,'registration'])->name('registration');
    Route::post('/registration', [AuthenticationController::class, 'registrationPost'])->name('registration.post');
    Route::post('/cancel-order', [ViewPlanController::class, 'cancelOrder'])->name('cancel-order');

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/payment/success', function () {return view('meals.success');})->name('meals.success');
    Route::get('/payments/create/{order_id}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payments/store/{order_id}', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/view-plan', [ViewPlanController::class, 'viewPlan'])->name('view.plan');
    Route::get('/viewMeals', [MealController::class, 'meals'])->name('viewMeals');
    Route::get('/build-plan', [BuildPlanController::class, 'index'])->middleware('auth')->name('build_plan');
    Route::get('/choose-days/{plan}', [BuildPlanController::class, 'chooseDays'])->name('chooseDays');
    Route::get('/store-days/{plan}/{nb}', [BuildPlanController::class, 'storeDays'])->name('storeDays');
    Route::get('/choose-meals/{planId}/{days}', [BuildPlanController::class, 'chooseMeals'])->name('chooseMeals');
    Route::post('/submit-plan', [BuildPlanController::class, 'submitPlan'])->name('submitPlan');
    Route::get('/order-confirmation/{id}', [OrderController::class, 'show'])->name('orderConfirmation');
    Route::post('/confirm-order', [OrderController::class, 'store'])->name('confirmOrder');
    Route::post('/store-user-meal-plan', [BuildPlanController::class, 'storeUserMealPlan'])->name('storeUserMealPlan');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/api/meals/{id}', function ($id) {
        $meal = \App\Models\Meal::select('meals.*', 'goals.name as goal_name')
            ->join('goals', 'meals.goal_id', '=', 'goals.id')
            ->findOrFail($id);
        return response()->json($meal);
    });
    Route::get('/order-details/{orderId}', [ViewPlanController::class, 'getOrderDetails']);
    Route::get('/order-history', [ViewPlanController::class, 'viewOrderHistory'])->name('order-history');


});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/meals', [MealController::class , 'index' ])->name('meals.index');
    Route::get('/meals/{meal}', [MealController::class , 'show' ])->name('meals.show');
    Route::get('/mealscreate', [MealController::class , 'create' ])->name('meals.create');
    Route::post('/meals',[MealController::class , 'store' ])->name('meals.store');
    Route::get('/meals/{meal}/edit', [MealController::class , 'edit' ])->name('meals.edit');
    Route::put('/meals/{meal}', [MealController::class , 'update' ])->name('meals.update');
    Route::post('/meals/{id}/toggle-availability', [MealController::class, 'toggleAvailability']);    Route::get('/plans', [PlanController::class , 'index' ])->name('plans.index');
    Route::get('/plans/{plan}', [PlanController::class , 'show' ])->name('plans.show');
    Route::get('/planscreate', [PlanController::class , 'create' ])->name('plans.create');
    Route::post('/plans',[PlanController::class , 'store' ])->name('plans.store');
    Route::get('/plans/{plan}/edit', [PlanController::class , 'edit' ])->name('plans.edit');
    Route::put('/plans/{plan}', [PlanController::class , 'update' ])->name('plans.update');
    Route::post('/plans/{id}/toggle-availability', [PlanController::class, 'toggleAvailability']);    Route::get('/plans', [PlanController::class , 'index' ])->name('plans.index');
    Route::get('/orders', [OrderController::class , 'index' ])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class , 'display' ])->name('orders.display');
    Route::get('/plan-types',[PlanTypeController::class , 'index' ])->name('plan-types.index');
    Route::get('/plan-typescreate', [PlanTypeController::class , 'create' ])->name('plan-types.create');
    Route::post('/plan-types',[PlanTypeController::class , 'store' ])->name('plan-types.store');
    Route::get('/plan-types/{id}/edit', [PlanTypeController::class , 'edit' ])->name('plan-types.edit');
    Route::put('/plan-types/{id}', [PlanTypeController::class , 'update' ])->name('plan-types.update');

});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'destroy'])->name('logout');
});