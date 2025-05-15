<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BorderDetailController;
use App\Http\Controllers\Backend\BorderRentCollection;
use App\Http\Controllers\Backend\TotalMealController;
use App\Http\Controllers\Backend\MealCostController;
use App\Http\Controllers\Backend\BazarController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\StaffSalaryController;
use App\Http\Controllers\Backend\ProductBuyController;
use App\Http\Controllers\Backend\TotalBillingController;
use App\Http\Controllers\Backend\DailyProblemController;
use App\Http\Controllers\Backend\RolePermissionController;

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



Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function() {
    Route::get('logout', [AdminController::class, 'destroy'])->name('logout');
    Route::get('profile-info/{id}', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile-info/{id}', [AdminController::class, 'update'])->name('profile_update');
    Route::get('password-change/{id}', [AdminController::class, 'password_change'])->name('password');
    Route::put('password-change/{id}', [AdminController::class, 'password_update'])->name('password_update');
    Route::controller(BorderDetailController::class)->group(function (){
        Route::get('border-details', 'index')->name('border_details');
        Route::get('border-details-create', 'create')->name('border_details_create');
        Route::post('border-details-create', 'store')->name('border_details_store');
        Route::get('border-details-edit/{id}', 'edit')->name('border_details_edit');
        Route::put('border-details-edit/{id}', 'update')->name('border_details_update');
        Route::get('border-details-show/{id}', 'show')->name('border_details_show');
        Route::get('border-details-delete/{id}', 'destroy')->name('border_details_delete');
        Route::get('border-pay-receipt/{id}','payment_receipt')->name('pay_receipt');
        Route::post('border-pay-receipt/{id}','payment_receipts')->name('pay_receipts');
        Route::get('border-pay-receipt/{id}/{month}','month_payment_receipt')->name('month_pay_receipt');
        Route::get('border-pay-receipt/mail/{id}/{month}','month_mail_receipt')->name('month_mail_receipt');
    });
    Route::controller(BorderRentCollection::class)->group(function (){
        Route::get('border-rent', 'index')->name('border_rent');
        Route::get('border-rent-create', 'create')->name('border_rent_create');
        Route::post('border-rent-create', 'store')->name('border_rent_store');
        Route::get('border-rent-edit/{id}', 'edit')->name('border_rent_edit');
        Route::put('border-rent-edit/{id}', 'update')->name('border_rent_update');
        Route::get('border-rent-delete/{id}', 'destroy')->name('border_rent_delete');
    });
    Route::controller(TotalMealController::class)->group(function (){
        Route::get('total-meal', 'index')->name('total_meal');
        Route::get('total-meal-create', 'create')->name('total_meal_create');
        Route::post('total-meal-create', 'store')->name('total_meal_store');
        Route::get('total-meal-edit/{id}', 'edit')->name('total_meal_edit');
        Route::put('total-meal-edit/{id}', 'update')->name('total_meal_update');
        Route::get('total-meal-delete/{id}', 'destroy')->name('total_meal_delete');
    });
    Route::controller(BazarController::class)->group(function (){
        Route::get('total-bazar', 'index')->name('total_bazar');
        Route::get('total-bazar-create', 'create')->name('total_bazar_create');
        Route::post('total-bazar-create', 'store')->name('total_bazar_store');
        Route::get('total-bazar-edit/{id}', 'edit')->name('total_bazar_edit');
        Route::put('total-bazar-edit/{id}', 'update')->name('total_bazar_update');
        Route::get('total-bazar-delete/{id}', 'destroy')->name('total_bazar_delete');
    });
    Route::controller(MealCostController::class)->group(function (){
        Route::get('meal-cost', 'index')->name('meal_cost');
        Route::get('meal-mealMonths', 'mealMonths')->name('mealMonths');
        Route::get('meal-monthlyMeals/{month}', 'monthlyMeals')->name('monthlyMeals');
        Route::get('meal-dailyMeals/{date}', 'dailyMeals')->name('dailyMeals');
        Route::get('meal-individualBorderMeals/{month}', 'individualBorderMeals')->name('individualBorderMeals');
        Route::get('meal-individualMeals/{month}/{border_detail_id}', 'individualMeals')->name('individualMeals');
        Route::get('meal-cost-create', 'create')->name('meal_cost_create');
        Route::post('meal-cost-create', 'store')->name('meal_cost_store');
        Route::get('meal-cost-edit/{id}', 'edit')->name('meal_cost_edit');
        Route::put('meal-cost-edit/{id}', 'update')->name('meal_cost_update');
        Route::get('meal-cost-delete/{id}', 'destroy')->name('meal_cost_delete');
    });
    Route::controller(StaffController::class)->group(function (){
        Route::get('staff', 'index')->name('staff');
        Route::get('staff-create', 'create')->name('staff_create');
        Route::post('staff-create', 'store')->name('staff_store');
        Route::get('staff-edit/{id}', 'edit')->name('staff_edit');
        Route::put('staff-edit/{id}', 'update')->name('staff_update');
        Route::get('staff-delete/{id}', 'destroy')->name('staff_delete');
    });
    Route::controller(StaffSalaryController::class)->group(function (){
        Route::get('staff-salary', 'index')->name('staff_salary');
        Route::get('staff-salary-create', 'create')->name('staff_salary_create');
        Route::post('staff-salary-create', 'store')->name('staff_salary_store');
        Route::get('staff-salary-edit/{id}', 'edit')->name('staff_salary_edit');
        Route::put('staff-salary-edit/{id}', 'update')->name('staff_salary_update');
        Route::get('staff-salary-show/{id}', 'show')->name('staff_salary_show');
        Route::get('staff-salary-delete/{id}', 'destroy')->name('staff_salary_delete');
    });
    Route::controller(ProductBuyController::class)->group(function (){
        Route::get('product-buy', 'index')->name('product_buy');
        Route::get('product-buy-create', 'create')->name('product_buy_create');
        Route::post('product-buy-create', 'store')->name('product_buy_store');
        Route::get('product-buy-edit/{id}', 'edit')->name('product_buy_edit');
        Route::put('product-buy-edit/{id}', 'update')->name('product_buy_update');
        Route::get('product-buy-show/{id}', 'show')->name('product_buy_show');
        Route::get('product-buy-delete/{id}', 'destroy')->name('product_buy_delete');
    });
    Route::controller(TotalBillingController::class)->group(function (){
        Route::get('total-bill', 'index')->name('total_bill');
        Route::get('total-bill-create', 'create')->name('total_bill_create');
        Route::post('total-bill-create', 'store')->name('total_bill_store');
        Route::get('total-bill-edit/{id}', 'edit')->name('total_bill_edit');
        Route::put('total-bill-edit/{id}', 'update')->name('total_bill_update');
        Route::get('total-bill-show/{id}', 'show')->name('total_bill_show');
        Route::get('total-bill-delete/{id}', 'destroy')->name('total_bill_delete');
    });
    Route::controller(DailyProblemController::class)->group(function (){
        Route::get('daily-problem', 'index')->name('daily_problem');
        Route::get('daily-problem-create', 'create')->name('daily_problem_create');
        Route::post('daily-problem-create', 'store')->name('daily_problem_store');
        Route::get('daily-problem-edit/{id}', 'edit')->name('daily_problem_edit');
        Route::put('daily-problem-edit/{id}', 'update')->name('daily_problem_update');
        Route::get('daily-problem-show/{id}', 'show')->name('daily_problem_show');
        Route::get('daily-problem-delete/{id}', 'destroy')->name('daily_problem_delete');
    });
    Route::controller(RolePermissionController::class)->group(function (){
        Route::get('permission', 'index')->name('permission');
        Route::get('permission-create', 'create')->name('permission_create');
        Route::post('permission-create', 'store')->name('permission_store');
        Route::get('permission-edit/{id}', 'edit')->name('permission_edit');
        Route::put('permission-edit/{id}', 'update')->name('permission_update');
        Route::get('permission-delete/{id}', 'destroy')->name('permission_delete');
        Route::get('role', 'role_index')->name('role');
        Route::get('role-create', 'role_create')->name('role_create');
        Route::post('role-create', 'role_store')->name('role_store');
        Route::get('role-edit/{id}', 'role_edit')->name('role_edit');
        Route::put('role-edit/{id}', 'role_update')->name('role_update');
        Route::get('role-delete/{id}', 'role_destroy')->name('role_delete');
        Route::get('role-permission', 'role_permission_index')->name('role_permission');
        Route::get('role-permission-create', 'role_permission_create')->name('role_permission_create');
        Route::post('role-permission-create', 'role_permission_store')->name('role_permission_store');
        Route::get('role-permission-edit/{id}', 'role_permission_edit')->name('role_permission_edit');
        Route::put('role-permission-edit/{id}', 'role_permission_update')->name('role_permission_update');
        Route::get('role-permission-delete/{id}', 'role_permission_destroy')->name('role_permission_delete');
    });
    Route::controller(AdminController::class)->group(function (){
        Route::get('user', 'index')->name('user');
        Route::get('user-create', 'create')->name('user_create');
        Route::post('user-create', 'store')->name('user_store');
        Route::get('user-edit/{id}', 'user_edit')->name('user_edit');
        Route::put('user-edit/{id}', 'user_update')->name('user_update');
        Route::get('user-delete/{id}', 'user_destroy')->name('user_delete');
    });
});

Route::get('testing',function (){
    return view('welcome');
});
Route::post('/fileUp', [\App\Http\Controllers\FileUploadController::class, 'fileUpload']);

require __DIR__.'/auth.php';
