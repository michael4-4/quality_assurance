<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;


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

Route::get('/home', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index1'])->name('home');

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/account_settings', [AccountSettingsController::class, 'index'])->name('account_settings');
Route::post('/update_account', [AccountSettingsController::class, 'update'])->name('update_account');

Route::get('/upload', [DocumentController::class, 'uploadForm'])->name('uploadForm');
Route::post('/upload', [DocumentController::class, 'upload'])->name('upload');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('/upload-profile-image', [ProfileController::class, 'uploadProfileImage'])->name('uploadProfileImage');
Route::delete('/delete-profile-image', [ProfileController::class, 'deleteProfileImage'])->name('deleteProfileImage');
