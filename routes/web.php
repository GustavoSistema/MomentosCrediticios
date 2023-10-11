<?php

use App\Http\Controllers\FilesController;
use App\Livewire\Clientes;
use App\Livewire\Cobranzas;
use App\Livewire\Evaluacion;
use App\Livewire\Inicio;
use App\Livewire\Prestamos;
use App\Livewire\VerEvaluacion;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::get('phpmyinfo', function () {
        phpinfo();
    })->name('phpmyinfo');
    


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');


        
    })->name('dashboard');

    Route::get('/clientes', Clientes::class)->name('clientes');
    Route::get('/prestamos', Prestamos::class)->middleware('can:admin.prestamos')->name('admin.prestamos');
    Route::get('/cobranzas', Cobranzas::class)->name('cobranzas');
    Route::get('/evaluacion', Evaluacion::class)->name('evaluacion');
    Route::get('/inicio', Inicio::class)->name('inicio');
    Route::get('/reportes', Evaluacion::class)->name('reportes');
    Route::get('/ver-evaluacion', VerEvaluacion::class)->name('ver-evaluacion');


    /*Route::get('/', [FilesController::class, 'loadView']);
    Route::post('/', [FilesController::class, 'storeFile']);
    Route::get('/descargar/{name}', [FilesController::class, 'downloadFile'])->name('download');*/

 });
