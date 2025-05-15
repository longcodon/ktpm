<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenController;
use App\Http\Controllers\FullController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\DanhmucController; 



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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/event/{slug}',[App\Http\Controllers\EventController::class,'index'])->name('event');
Route::get('/full/{slug}',[App\Http\Controllers\FullController::class,'index'])->name('full');
Route::get('/pay/',[App\Http\Controllers\PayController::class,'index'])->name('pay');


Route::resource('danhmuc', DanhmucController::class);



