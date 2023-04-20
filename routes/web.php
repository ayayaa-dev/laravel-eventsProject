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

// Route::get('/', function () {
    // return view('startMainPage'); // start Main page
    // return view('start'); // start Login form
// });
// Main page routes
Route::get('/', [EventController::class, 'listLimit']); // 3 events on home page
Route::get('/show/{event}', [EventController::class, 'show']); // info about a single event

// Login / Logout
Route::get('/login', [AuthController::class, 'login'])->name('login'); // view login form page
Route::post('/login', [AuthController::class, 'authenticate']); // authenticate credentials in login form
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration
Route::get('/register', [AuthController::class, 'register']);
Route::post('/signup', [UserController::class, 'register_store']);
// Route::get('/registerResult', [UserController::class, 'register_store']);

// Dashboard routes
Route::group(['middleware' => ['auth']], function () {
    // Only for authorized users
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    
    // for Admin, Manager roles
    Route::middleware('manager')->group(function () {
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
    });
    
    // for Admin role
    Route::middleware('admin')->group(function () {
        // ------ User List CRUD
        Route::get('/users', [UserController::class,'index']);
        // filter users by role
        Route::post('/userByRole', [UserController::class,'userByRole']);
        // CREATE user
        Route::get('/adduser', [UserController::class,'create']);
        Route::post('/adduser', [UserController::class,'store']);
        // UPDATE user
        Route::get('/edituser/{user}', [UserController::class,'edit']);
        Route::post('/edituser/{user}', [UserController::class,'update']);
    });
    // user profile (edit)
    Route::get('/profile/{user}', [UserController::class,'edit']);
    Route::get('/edituser/{user}', [UserController::class,'edit']);
    Route::post('/edituser/{user}', [UserController::class,'update']);
});