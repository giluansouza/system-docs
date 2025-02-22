<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::post('/documents', [DocumentController::class, 'store']);
Route::get('/documents/search', [DocumentController::class, 'search']);
