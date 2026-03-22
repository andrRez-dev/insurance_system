<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\checkIsAdmin;

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/', function(){
        return redirect()->to('/owners');
    });
    Route::get('/owners', [OwnerController::class, 'getData'])->name('owners');
    Route::resource('cars', CarController::class)->only(['index']);

    Route::middleware([checkIsAdmin::class])->group(function() {
        Route::post('owners/add', [OwnerController::class, 'add'])->name('addOwner');
        Route::match(['GET', 'POST'], 'owner/edit/{id}', [OwnerController::class, 'edit'])->name('editOwner');
        Route::get('owner/delete/{id}', [OwnerController::class, 'delete'])->name('deleteOwner');
        Route::resource('cars', CarController::class)->except([
            'show', 'create', 'index'
        ]);
    });
});