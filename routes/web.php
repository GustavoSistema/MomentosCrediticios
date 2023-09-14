<?php

use App\Livewire\Clientes;
use App\Livewire\Cobranzas;
use App\Livewire\Prestamos;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/clientes', Clientes::class)->name('clientes');
    Route::get('/prestamos', Prestamos::class)->name('prestamos');
    Route::get('/cobranzas', Cobranzas::class)->name('cobranzas');
});

