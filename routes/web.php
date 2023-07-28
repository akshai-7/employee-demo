<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
    return view('auth.login');
});

Route::get('/register', [App\Http\Controllers\UserController::class, 'store'])->name('register');
Route::view('/register', [App\Http\Controllers\UserController::class, 'register']);

Auth::routes();

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user', [App\Http\Controllers\UserController::class, 'userlist'])->name('user');
Route::get('/edituser/{id}', [App\Http\Controllers\UserController::class, 'edituser']);
Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/remove/{id}', [App\Http\Controllers\UserController::class, 'remove']);
Route::get('/usersearch', [App\Http\Controllers\UserController::class, 'usersearch']);





Route::get('session/get',  [App\Http\Controllers\SessionController::class, 'accessSessionData']);
Route::get('session/set',  [App\Http\Controllers\SessionController::class, 'storeSessionData']);
Route::get('session/remove', [App\Http\Controllers\SessionController::class, 'deleteSessionData']);
