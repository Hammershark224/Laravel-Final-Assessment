<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\BoothController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard',  [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth', 'checkUserRole:admin', 'checkUser:admin@argon.com'])->group(function () {
	Route::get('/application/adminManage', [ApplicationController::class, 'indexAdmin'])->name('application.adminManage');
	Route::get('/application/adminEdit/{id}', [ApplicationController::class, 'adminEdit'])->name('application.adminEdit');
	Route::get('/application/adminUpdate/{id}', [ApplicationController::class, 'adminUpdate'])->name('application.adminUpdate');
	
	Route::get('/response', [ComplaintController::class, 'indexAdmin'])->name('response');
	Route::get('/response/{id}/edit', [ComplaintController::class, 'edit'])->name('response.edit');
	Route::post('/response/{id}/createResponse', [ComplaintController::class, 'createResponse'])->name('response.create');
	Route::get('/response/{id}/delete', [ComplaintController::class, 'adminDelete'])->name('response.delete');
	
	Route::get('/adminBooth', [BoothController::class, 'indexAdmin'])->name('booth.indexAdmin');
	Route::get('/adminBooth/{id}/delete', [BoothController::class, 'delete'])->name('booth.delete');
});

Route::middleware(['auth', 'checkUserRole:vendor'])->group(function () {
	Route::get('/application', [ApplicationController::class, 'index'])->name('application.manage');
	Route::get('/application/create', [ApplicationController::class, 'create'])->name('application.create');
	Route::post('/application/store', [ApplicationController::class, 'store'])->middleware('checkApplicationValidation')->name('application.store');
	Route::get('/application/show/{id}', [ApplicationController::class, 'show'])->name('application.show');
	
	Route::get('/complaint','App\Http\Controllers\ComplaintController@index')->name('complaint.manage');
	Route::get('/complaint/create-complaint', [ComplaintController::class, 'create'])->name('complaint.create');
	Route::post('/complaint/create', [ComplaintController::class, 'createComplaint'])->name('complaint.store');
	Route::get('/complaint/{id}/show', [ComplaintController::class, 'show'])->name('complaint.show');
	Route::get('/complaint/{id}/delete', [ComplaintController::class, 'delete'])->name('complaint.delete');
	
	Route::get('/booth/show', [BoothController::class, 'show'])->name('booth.show');
});

Route::get('documents/{fileName}', [ApplicationController::class, 'displayFile'])->middleware('auth')->name('file.display');

Route::group(['middleware' => 'auth'], function () {
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


