<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController; 
use App\Http\Controllers\OutfitController;

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

Route::group(['prefix' => 'masters'], function(){
   Route::get('', [MasterController::class, 'index'])->name('master.index');
   Route::get('create', [MasterController::class, 'create'])->name('master.create');
   Route::post('store', [MasterController::class, 'store'])->name('master.store');
   Route::get('edit/{master}', [MasterController::class, 'edit'])->name('master.edit');
   Route::post('update/{master}', [MasterController::class, 'update'])->name('master.update');
   Route::post('delete/{master}', [MasterController::class, 'destroy'])->name('master.destroy');
   Route::get('show/{master}', [MasterController::class, 'show'])->name('master.show');
});

Route::group(['prefix' => 'outfits'], function(){
    Route::get('', [BookController::class, 'index'])->name('outfit.index');
    Route::get('create', [BookController::class, 'create'])->name('outfit.create');
    Route::post('store', [BookController::class, 'store'])->name('outfit.store');
    Route::get('edit/{outfit}', [BookController::class, 'edit'])->name('outfit.edit');
    Route::post('update/{outfit}', [BookController::class, 'update'])->name('outfit.update');
    Route::post('delete/{outfit}', [BookController::class, 'destroy'])->name('outfit.destroy');
    Route::get('show/{outfit}', [BookController::class, 'show'])->name('outfit.show');
 });
 
