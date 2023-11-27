<?php

use App\Http\Controllers\AppoitmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Models\Designation;

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

Route::get('/login', [AuthController::class, 'show_login']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'show_register']);
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    // designations
    Route::resource('designations', DesignationController::class)->names('designations');

    // doctors
    Route::resource('doctors', DoctorController::class)->names('doctors');

    // patients
    Route::resource('patients', PatientController::class)->names('patients');

    // patients
    Route::resource('appoitments', AppoitmentController::class)->names('appoitments');
});


Route::get('/', function(){
    return redirect()->route('home');
    //return view('welcome');
}); 