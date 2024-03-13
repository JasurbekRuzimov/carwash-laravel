<?php

use App\Http\Controllers\MoykaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[\App\Http\Controllers\SiteController::class, 'index'])->name('site.index');
Route::get('/navbat/{moyka_id}',[\App\Http\Controllers\SiteController::class, 'showNavbat'])->name('site.showNavbat');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/navbat/{moyka_id}/create',[\App\Http\Controllers\SiteController::class, 'createOrder'])->name('site.createOrder');
    Route::post('/navbat/{moyka_id}/create',[\App\Http\Controllers\SiteController::class, 'storeOrder'])->name('site.storeOrder');
});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('moyka', MoykaController::class);
    Route::delete('/destroy-order/{order_id}',[\App\Http\Controllers\SiteController::class, 'destroyOrder'])->name('site.destroyOrder');
});

require __DIR__.'/auth.php';
