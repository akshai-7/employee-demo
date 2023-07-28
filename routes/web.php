<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user', [UserController::class, 'userlist'])->name('user');
Route::get('/edituser/{id}', [UserController::class, 'edituser']);
Route::post('/update/{id}', [UserController::class, 'update']);
Route::get('/remove/{id}', [UserController::class, 'remove']);
Route::get('/usersearch', [UserController::class, 'usersearch']);
