<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\StateController;
use App\Models\Job;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('user.auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('user.create');
Route::get('verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot');
Route::post('forgot-password', [AuthController::class, 'processForgot'])->name('forgotPassword.process');
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('user.pass.reset.show');
Route::post('reset-password/{token}', [AuthController::class, 'processResetPassword'])->name('user.pass.reset.process');
// Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::delete('logout', fn() => to_route('auth.logout'))->name('logout');
Route::delete('logout', [AuthController::class, 'destroy'])->name('auth.logout');

// Route::resource('jooob', JobController::class);

Route::middleware(['adminuser'])->group( function() {
  Route::get('panel/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

  Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
  Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
  Route::match(['put','patch'],'jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
  Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
  Route::delete('jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
  Route::resource('categories', CategoryController::class)->only(['index', 'show','create', 'edit','store','update','destroy']);
  Route::resource('companies', CompanyController::class)->only(['index', 'edit', 'show','create','store','update','destroy']);
  Route::resource('countries', CountryController::class)->only(['index', 'show','create', 'edit','store','update','destroy']);
  Route::resource('states', StateController::class)->only(['index', 'show','create', 'edit','store','update','destroy']);
  Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store']);
  Route::resource('my-job-application', MyJobApplicationController::class)->only(['index','destroy','store']);
  
});
// Route::delete('logout' , fn () => to_route('user.logout'))->name('logout');
// Route::delete('logout', [AuthController::class, 'destroy'])->name('user.logout');
Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show');