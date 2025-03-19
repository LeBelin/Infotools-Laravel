<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Http\Controllers\CommunController;
use App\Http\Controllers\FactureController;


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
    return view('index');
});
//Route::get('/login', function () {
  //  return view('Login.login');
//});

Route::get('/counter', Counter::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::get('/dashboard', [CommunController::class, 'index'])->name('dashboard');
    Route::get('/commun', function () {
        return view('commun.index');
    })->name('commun');
    Route::get('/rdv', function () {
        return view('rdv.index');
    })->name('rdv');
    
});

Route::resource('rdv', FactureController::class);

Route::resource('commun', CommunController::class);




