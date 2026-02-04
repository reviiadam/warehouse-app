<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;

/* Public */

Route::get('/', function () {
    return view('welcome');
});

/* Authenticated Routes */
Route::middleware(['auth'])->group(function () {

    /* Dashboard */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /* Master Product */
    Route::resource('products', ProductController::class);

    /* Transaction (In & Out Product) */
    Route::resource('incomings', IncomingController::class)
        ->only(['index', 'create', 'store']);

    Route::resource('outgoings', OutgoingController::class)
        ->only(['index', 'create', 'store']);

    /* Report Product */
    Route::get('/reports/stock', [ProductController::class, 'reportStock'])
        ->name('reports.stock');

    Route::get('/reports/incoming', [IncomingController::class, 'report'])
        ->name('reports.incoming');

    Route::get('/reports/outgoing', [OutgoingController::class, 'report'])
        ->name('reports.outgoing');

    /* Profile */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
