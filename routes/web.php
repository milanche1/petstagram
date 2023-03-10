<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PetsController;

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
Route::get('/pet/{id}', [MainController::class, 'viewPet'])->name('viewPet');
Route::get('/create-pet', [MainController::class, 'createPet'])->name('createPet');
Route::post('/create-pet', [MainController::class, 'storePet']);

// Owner
Route::get('/create-owner', [MainController::class, 'createOwner'])->name('createOwner');
Route::post('/create-owner', [MainController::class, 'storeOwner'])->name('storeOwner');

// About
Route::get('/about', [MainController::class, 'about'])->name('about');
