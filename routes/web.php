<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VirtualController;

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
Auth::routes();
 
// In routes/web.php
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('logins',LoginController::class);
Route::post('/login', [LoginController::class, 'login'])->name('login');
//Route::get('/home', 'HomeController@index')->name('home');

//For User Controller
Route::get('/show-registered-data', [UserController::class, 'showRegisteredData'])->name('show-registered-data');
Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
Route::patch('/update-user/{id}', [UserController::class, 'updateUserData'])->name('update-user');
Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
//Route::get('/addUserForm', [UserController::class, 'addUserForm'])->name('add-user-form');
Route::any('/add-new-user', [UserController::class, 'addNewUser'])->name('add-new-user');

//For Virtual Controller
Route::any('/show-virtual-event', [VirtualController::class, 'showVirtualEvent'])->name('show-virtual-event');
Route::post('/virtual', [VirtualController::class, 'create'])->name('virtual');
Route::get('/show-virtual-data', [VirtualController::class, 'showVirtualData'])->name('show-virtual-data');
Route::delete('/delete-user/{id}', [VirtualController::class, 'deleteUser'])->name('delete-user');
Route::get('/add-event', [VirtualController::class, 'addEvent'])->name('add-event');
Route::any('/add-new-event', [VirtualController::class, 'addNewEvent'])->name('add-new-event');