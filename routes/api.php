<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('clientes', [ClientController::class, 'index']);
Route::post('clientes', [ClientController::class, 'store']);
Route::get('clientes/{id}', [ClientController::class, 'show']);
Route::get('clientes/{id}/contatos', [ClientController::class, 'showContacts']);
Route::post('contatos', [ContactController::class, 'store']);
