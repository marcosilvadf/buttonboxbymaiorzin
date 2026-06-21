<?php

use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\ApiPanelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/mercado-pago')->group(function() {
    Route::post('/', [MercadoPagoController::class, 'webhook'])->name('mercadopagowebhook');
});

Route::get('/hash-user/{pchash}/{hash}', [ApiPanelController::class, 'returnHtmlHashUser']);
Route::get('/hash-user/{pchash}', [ApiPanelController::class, 'returnHtmlTrial']);

Route::get('version', function() {
    return response()->json('1.0.0.1', 200);
});