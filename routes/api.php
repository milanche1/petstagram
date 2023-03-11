<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pets', [ApiController::class, 'pets']);
Route::get('/pet/{id}', [ApiController::class, 'pet']);
Route::get('/owners', [ApiController::class, 'owners']);
Route::get('/owner/{id}', [ApiController::class, 'owner']);
Route::post('/owner', [ApiController::class, 'ownerStore']);

