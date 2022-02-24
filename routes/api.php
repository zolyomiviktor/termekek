<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TermekController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'register']);
Route::get('termeks', [ProductController::class, 'index']);
Route::post('termeks', [ProductController::class, 'store']);
Route::get('termeks/{id}', [ProductController::class, 'show']);
Route::put('termeks/{id}', [ProductController::class, 'update']);
Route::delete('termeks/{id}', [ProductController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});