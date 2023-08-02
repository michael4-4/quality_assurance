<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AccountSettingsController;

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
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register'); //shows the registration form

Route::post('/register', [AuthController::class, 'registerPost'])->name('register'); //registration process

Route::get('/login', [AuthController::class, 'login'])->name('login'); //shows the login form

Route::post('/login', [AuthController::class, 'loginPost'])->name('login'); //login process

Route::get('home', [HomeController::class, 'home']);

Route::get('/home', [HomeController::class, 'home']);

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload', [UploadController::class, 'showUploadPage'])->name('upload');

Route::get('/account_settings', [AccountSettingsController::class, 'index'])->name('account_settings');
Route::post('/update_account', [AccountSettingsController::class, 'update'])->name('update_account');