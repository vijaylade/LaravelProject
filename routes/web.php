<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Employee\DataController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Admin\ForgetController;

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
    return view('welcome');
});

//Group Middleware
Route::group(['middleware'=>'cache'], function() {

    //Routes for login
    Route::get('/login', [AuthController::class, 'index'])->name('index');
    Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');

    //Route for header,footer,slider
    Route::get('/headerdash', [AuthController::class, 'headerdash']);

    //Routes for admin & employee dashboard
    Route::get('/admindash', [AuthController::class, 'admindash']);
    Route::get('/empdash', [AuthController::class, 'empdash']);

    //Route for admin & employee logout
    Route::get('/logout', [AuthController::class, 'logout']);

    //Route for show the all employee details on admin dashboard
    Route::get('/employee', [AuthController::class, 'employee']);

    //Routes for admin side functionality employee add,update,delete
    Route::post('/store', [DataController::class, 'store']);
    Route::get('/show', [DataController::class, 'show']);
    Route::get('/edit/{id}', [DataController::class, 'edit']);
    Route::post('/update', [DataController::class, 'update']);
    Route::get('/delete/{id}', [DataController::class, 'delete']);

    //Routes for employee edit profile
    Route::post('/empupdate', [DataController::class, 'empupdate']);

    //Route for total count of employees
    Route::get('/all', [DataController::class, 'all']);

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('authenticate');

});

Route::get('/empleave', [EmployeeController::class, 'empleave']);   

Route::get('/forget',[ForgetController::class,'forgetpage']);
Route::post('/forget',[ForgetController::class,'forget']);
Route::get('/reset/{token}',[ForgetController::class,'reset']);
Route::post('/reset',[ForgetController::class,'resetpassword'])->name('resetpassword');
Route::post('/newpassword',[ForgetController::class,'newpassword']);



