<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dipendenti;
use App\Http\Livewire\BustePaga;
use App\Http\Livewire\UploadsBustePaga;
use App\Http\Controllers\GestioneBustePagaController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dipendenti',Dipendenti::class)->name('dipendenti');
Route::get('/bustepaga/{id}', [BustePaga::class,'render']);
Route::get('/uploadBustePaga/{messaggio}',[UploadsBustePaga::class, 'render'])->name('uploadBustePaga');
Route::post('/gestioneBustePaga',GestioneBustePagaController::class)->name('gestioneBustePaga');
