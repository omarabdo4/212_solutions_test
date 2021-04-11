<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdController as AdminAdController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function (){
        return redirect()->route('admin.ads.list');
    })->name('home');
    Route::get('ads', [AdminAdController::class, 'index'])->name('ads.list');
    Route::get('ads/create', [AdminAdController::class, 'create'])->name('ads.create');
});
