<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaDataController;


// Route::get('/', function () {
//     return view('login.login');
// });

// Route::get('/home', [HomeController::class, 'home']);

// Route::get('/', function(){
//     return view('dashboard.index');
// })->middleware('auth');

Auth::routes();
Route::get('/register', function() {
    return redirect('/login');
});
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/dashboard/profil', DashboardProfilController::class);

Route::get('/dashboard/profil', [KelolaDataController::class, 'index'])->name('profil');

Route::get('/dashboard/tambahdata_View', [KelolaDataController::class, 'tambahdata_View'])->name('tambahdata_View');
Route::post('/dashboard/tambahdata', [KelolaDataController::class, 'tambahdata'])->name('tambahdata');

Route::get('/dashboard/editdata_View/{id}', [KelolaDataController::class, 'editdata_View'])->name('editdata_View');
Route::post('/dashboard/editdata/{id}', [KelolaDataController::class, 'editdata'])->name('editdata');

Route::get('/dashboard/delete/{id}', [KelolaDataController::class, 'delete'])->name('delete');

Route::get('/dashboard/cetakpdf', [KelolaDataController::class, 'cetakpdf'])->name('cetakpdf');

Route::get('/dashboard/cetakexcel', [KelolaDataController::class, 'cetakexcel'])->name('cetakexcel');




