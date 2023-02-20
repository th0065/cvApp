<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [App\Http\Controllers\CvController::class, 'index'])->name('index');
Route::get('/create', [App\Http\Controllers\CvController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\CvController::class, 'store'])->name('store');
Route::post('/destroy', [App\Http\Controllers\CvController::class, 'destroy'])->name('destroy');
Route::get('/edit/{id}', [App\Http\Controllers\CvController::class, 'edit'])->name('edit');
Route::get('/show/{id}', [App\Http\Controllers\CvController::class, 'show'])->name('show');
Route::post('/update', [App\Http\Controllers\CvController::class, 'update'])->name('update');
Route::get('/role/{id}', [App\Http\Controllers\UserController::class, 'role'])->name('role');

Route::post('/role/store', [App\Http\Controllers\UserController::class, 'store'])->name('roleUser');
Route::post('/emploi', [App\Http\Controllers\UserController::class, 'emploi'])->name('emploi');
Route::get('/emploi/{id}', [App\Http\Controllers\UserController::class, 'emploiCreate'])->name('emploi.create');

Route::post('/delEmploi', [App\Http\Controllers\UserController::class, 'delEmploi'])->name('destroy.emploi');
Route::get('/editEmploi/{id}', [App\Http\Controllers\UserController::class, 'editEmploi'])->name('edit.emploi');
Route::post('/update/emploi', [App\Http\Controllers\UserController::class, 'updateEmploi'])->name('emploi.update');
Route::post('/postule', [App\Http\Controllers\UserController::class, 'postuleEmploi'])->name('postule.emploi');
Route::get('/demandes/{id}', [App\Http\Controllers\UserController::class, 'demandes'])->name('demandes');
Route::post('/delDemande', [App\Http\Controllers\UserController::class, 'delDemande'])->name('delDemande');
Route::get('/postulants/{id}', [App\Http\Controllers\UserController::class, 'postulants'])->name('postulants');
Route::get('/aceptDemande/{id}', [App\Http\Controllers\UserController::class, 'aceptDemande'])->name('aceptDemande');
