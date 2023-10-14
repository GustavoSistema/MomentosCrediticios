<?php

use App\Http\Controllers\FilesController;
use App\Livewire\AdminPermisos;
use App\Livewire\AdminRoles;
use App\Livewire\Clientes;
use App\Livewire\Cobranzas;
use App\Livewire\Evaluacion;
use App\Livewire\Inicio;
use App\Livewire\Prestamos;
use App\Livewire\Productos;
use App\Livewire\Reporte;
use App\Livewire\Talleres;
use App\Livewire\Usuarios;
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


    Route::get('/inicio', Inicio::class)->name('inicio');
    // evaluacion
    Route::get('/evaluacion', Evaluacion::class)->name('evaluacion');
    Route::get('/evaluacion', Evaluacion::class)->middleware('can:admin.evaluacion')->name('admin.evaluacion');
    Route::get('/ver-evaluacion', VerEvaluacion::class)->name('ver-evaluacion');
    Route::get('/ver-evaluacion', VerEvaluacion::class)->middleware('can:admin.ver-evaluacion')->name('admin.ver-evaluacion');
    // prestamos
    Route::get('/clientes', Clientes::class)->name('clientes');
    Route::get('/clientes', Clientes::class)->middleware('can:admin.clientes')->name('admin.clientes');
    Route::get('/prestamos', Prestamos::class)->middleware('can:admin.prestamos')->name('admin.prestamos');
    Route::get('/cobranzas', Cobranzas::class)->middleware('can:admin.cobranzas')->name('admin.cobranzas');
    //Route::get('/cobranzas', Cobranzas::class)->name('cobranzas');
    //tablas
    Route::get('/talleres', Talleres::class)->name('talleres');
    Route::get('/talleres', Talleres::class)->middleware('can:admin.talleres')->name('admin.talleres');
    Route::get('/productos', Productos::class)->name('productos');
    Route::get('/productos', Productos::class)->middleware('can:admin.productos')->name('admin.productos'); 
    //reportes    
    Route::get('/reportes', Evaluacion::class)->name('reportes');   
    Route::get('/reporte', Reporte::class)->name('reporte');     
    //usuarios y roles 
    Route::get('/admin-permisos', AdminPermisos::class)->name('admin-permisos');
    Route::get('/admin-permisos', AdminPermisos::class)->middleware('can:admin.admin-permisos')->name('admin.admin-permisos');
    Route::get('/admin-roles', AdminRoles::class)->name('admin-roles');
    Route::get('/admin-roles', AdminRoles::class)->middleware('can:admin.admin-roles')->name('admin.admin-roles');
    Route::get('/usuarios', Usuarios::class)->name('usuarios');
    Route::get('/usuarios', Usuarios::class)->middleware('can:admin.usuarios')->name('admin.usuarios');
    

    /*Route::get('/', [FilesController::class, 'loadView']);
    Route::post('/', [FilesController::class, 'storeFile']);
    Route::get('/descargar/{name}', [FilesController::class, 'downloadFile'])->name('download');*/

 });
