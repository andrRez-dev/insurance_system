<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/', [OwnerController::class, 'getData'])->name('home');
    Route::post('owners/add', [OwnerController::class, 'add'])->name('addOwner');
    Route::match(['GET', 'POST'], 'owner/edit/{id}', [OwnerController::class, 'edit'])->name('editOwner');
    Route::get('owner/delete/{id}', [OwnerController::class, 'delete'])->name('deleteOwner');
});