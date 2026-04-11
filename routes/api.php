<?php

use App\Http\Controllers\ServicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {


Route::post('/servicos', [ServicoController::class, 'store']);
Route::get('/servicos', [ServicoController::class, 'index']);
Route::post('/despesas', [DespesasController::class, 'store']);
Route::delete('/servicos/{id}', [ServicoController::class, 'destroy']); 
Route::delete('/despesas/{id}', [DespesasController::class, 'destroy']);

});