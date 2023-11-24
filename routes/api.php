<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ResepController; 
use App\Http\Controllers\KategoriController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout'])->middleware(['auth:sanctum']);

// Route::get('resep', [ResepController::class, 'index'])->middleware(['auth:sanctum']); 
// Route::get('resep/{id}', [ResepController::class, 'show']);
// Route::post('resep',[ResepController::class, 'store'])->middleware(['auth:sanctum']);
// Route::put('resep/{id}',[ResepController::class, 'update'])->middleware(['auth:sanctum']);
// Route::delete('resep/{id}', [ResepController::class, 'destroy'])->middleware(['auth:sanctum']);

Route::group(['middleware' => ['auth:sanctum']], function () {    
        
    Route::resource('/resep', ResepController::class);

    Route::resource('/kategori', KategoriController::class);
       
});