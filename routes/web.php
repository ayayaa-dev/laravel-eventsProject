<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
    return view('start'); // start login form
});

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
// ------ Event List CRUD
// GET list of events
Route::get('/eventlist', [EventController::class,'index']);
// CREATE event
Route::get('/addevent', [EventController::class,'create']);
Route::post('/addevent', [EventController::class,'store']);
// UPDATE event
Route::get('/editevent/{event}', [EventController::class,'edit']);
Route::post('/editevent/{event}', [EventController::class,'update']);
// DELETE event
Route::delete('/eventlist/{event}', [EventController::class,'destroy']);

// ------ User List CRUD
Route::get('/users', [UserController::class,'index']);
// filter users by role
Route::post('/userByRole', [UserController::class,'userByRole']);
// CREATE user
Route::get('/adduser', [UserController::class,'create']);
Route::post('/adduser', [UserController::class,'store']);
// UPDATE event
Route::get('/edituser/{user}', [UserController::class,'edit']);
Route::post('/edituser/{user}', [UserController::class,'update']);
// ----
Route::get('/profile/{user}', [UserController::class,'edit']);
Route::get('/edituser/{user}', [UserController::class,'edit']);
Route::post('/edituser/{user}', [UserController::class,'update']);

// ------ Login to admin panel
Route::get('/login', [AuthController::class, 'login'])->name('login'); // view login form page
Route::post('/login', [AuthController::class, 'authenticate']); // authenticate credentials in login form
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
