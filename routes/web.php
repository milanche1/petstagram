<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\OwnersController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

// PET
Route::get('/pet/{id}', [PetsController::class, 'viewPet'])->name('viewPet');
Route::get('/create-pet', [PetsController::class, 'createPet'])->name('createPet');
Route::post('/create-pet', [PetsController::class, 'storePet'])->name('storePet');

// Owner
Route::get('/create-owner', [OwnersController::class, 'createOwner'])->name('createOwner');
Route::post('/create-owner', [OwnersController::class, 'storeOwner'])->name('storeOwner');

// About
Route::get('/about', [MainController::class, 'about'])->name('about');
