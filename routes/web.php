<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\MessageController;

Route::get('/', [MessageController::class, 'create']);
Route::post('/', [MessageController::class, 'store']);
Route::get('/message/{token}', [MessageController::class, 'show']);



