<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManageDetailsController;


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

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [AuthController::class, 'registerPost'])->name('register'); //registration process

Route::get('/login', [AuthController::class, 'login'])->name('login'); //shows the login form

Route::post('/login', [AuthController::class, 'loginPost'])->name('login'); //login process

Route::get('/home', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index1'])->name('home');

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/account_settings', [AccountSettingsController::class, 'index'])->name('account_settings');
Route::post('/update_account', [AccountSettingsController::class, 'update'])->name('update_account');

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', [DocumentController::class, 'uploadForm'])->name('upload.form');
    Route::post('/upload', [DocumentController::class, 'upload'])->name('upload');
    Route::get('/upload', [DocumentController::class, 'showUploadForm'])->name('upload');

});

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/update-profile-image', [ProfileController::class, 'updateProfileImage'])->name('updateProfileImage');
Route::post('/edit-profile-image', [ProfileController::class, 'editProfileImage'])->name('editProfileImage');;

Route::delete('/deleteProfileImage', [ProfileController::class, 'deleteProfileImage']);

Route::post('/save-cropped-image', 'ProfileController@saveCroppedImage')->name('saveCroppedImage');

Route::get('/filter-documents', 'DocumentController@filterDocuments')->name('filter.documents');
// routes/web.php

Route::delete('/delete_document/{document}', [DocumentController::class, 'delete'])->name('delete_document');

Route::post('/change-password', [AccountSettingsController::class, 'changePassword'])->name('change-password');

Route::get('/manage_details', [ManageDetailsController::class, 'manageDetails'])->name('manage_details');

Route::post('/add-role', [ManageDetailsController::class, 'addRole'])->name('add_role');

Route::delete('/delete-all-roles', [ManageDetailsController::class, 'deleteAllRoles'])->name('delete-all-roles');

Route::post('/add-department', [ManageDetailsController::class, 'addDepartment'])->name('add_department');


Route::post('add-programcourse', [ManageDetailsController:: class, 'addProgramCourse'])->name('add_programcourse');