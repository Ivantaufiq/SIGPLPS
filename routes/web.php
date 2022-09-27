<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\TambahDataController;

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

// Route::get('/', function () {
//     return view('login.login');
// });

// Route::get('/home', [HomeController::class, 'home']);

Route::get('/', function(){
    return view('dashboard.index');
})->middleware('auth');

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/dashboard/profil', DashboardProfilController::class);

Route::get('/dashboard/profil', [TambahDataController::class, 'index'])->name('profil');
Route::get('/dashboard/tambahdata', [TambahDataController::class, 'datasekolah'])->name('tambahdata');
Route::post('/dashboard/insertdata', [TambahDataController::class, 'insertdata'])->name('insertdata');

Route::get('/dashboard/tampildata/{id}', [TambahDataController::class, 'tampildata'])->name('tampildata');
Route::post('/dashboard/updatedata/{id}', [TambahDataController::class, 'updatedata'])->name('updatedata');

Route::get('/dashboard/delete/{id}', [TambahDataController::class, 'delete'])->name('delete');

// export pdf
Route::get('/dashboard/exportpdf', [TambahDataController::class, 'exportpdf'])->name('exportpdf');
//export excel
Route::get('/dashboard/exportexcel', [TambahDataController::class, 'exportexcel'])->name('exportexcel');

