<?php

use App\Http\Controllers\HouseController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    Route::get('/', [HouseController::class, 'index'])->name('houses');
    Route::get('/houses/create', [HouseController::class, 'create'])->name('create');
    Route::post('/houses', [HouseController::class, 'store']);
    Route::get('houses/{house}', [HouseController::class, 'show'])->name('show');
    Route::get('/houses/{house}/edit', [HouseController::class, 'edit'])->name('edit');
    Route::patch('/houses/{house}', [HouseController::class, 'update'])->name('house_update');
    Route::delete('/houses/{house}', [HouseController::class, 'destroy']);
    Route::delete('/houses/{house}/forceDelete', [HouseController::class, 'forceDelete']);
    Route::get('/houses', [HouseController::class, 'about'])->name('about');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
require __DIR__.'/auth.php';
