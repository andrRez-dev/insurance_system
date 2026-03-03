<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/', function(){
        return redirect()->to('/owners');
    });
    Route::get('/owners', [OwnerController::class, 'getData'])->name('owners');
    Route::post('owners/add', [OwnerController::class, 'add'])->name('addOwner');
    Route::match(['GET', 'POST'], 'owner/edit/{id}', [OwnerController::class, 'edit'])->name('editOwner');
    Route::get('owner/delete/{id}', [OwnerController::class, 'delete'])->name('deleteOwner');
    Route::resource('cars', CarController::class)->except([
        'show', 'create'
    ]);
});