<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ApiController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('page.dashboard');
    })->name('home');
    
    Route::get('/dashboard', function () {
        return view('page.dashboard');
    })->name('dashboard');
    
    Route::get('/reportes', function () {
        return view('page.reporte.index');
    })->name('reportes');
    
    Route::get('/signout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('signout');
    
   

    Route::resources([
        'clientes' => ClienteController::class,
        'prestamos' => PrestamoController::class,
        'pagos' => PagoController::class
    ]);
});

// API
Route::get('/client',[ClienteController::class, 'api']);
Route::get('/todos-los-clientes',[ApiController::class, 'clientes']);
Route::get('/prestamos-abiertos',[ApiController::class, 'prestamosAbiertos']);
Route::get('/prestamo-del-cliente',[ApiController::class, 'prestamoDelCliente']);
Route::get('/api/prestamo',[ApiController::class, 'prestamo']);