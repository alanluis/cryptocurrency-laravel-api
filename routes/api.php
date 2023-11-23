<?php

use App\Interfaces\CryptocurrencyInterface;
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

Route::get('/coins/markets', function (Request $request, CryptocurrencyInterface $cryptocurrencyService) {
    $params = [
        'vs_currency' => $request->query('vs_currency', 'usd'),
        '_key' => $request->query('key', ''),
        'per_page' => $request->query('per_page', '100'),
        'order' => $request->query('order', 'market_cap_desc'),
    ];

    try {
        $response = $cryptocurrencyService->getMarkets($params);
    } catch (\Throwable $th) {
        return Response::json(["error" => $th->getCode(), "error_message" => $th->getMessage()], $th->getCode());
    }

    return Response::json($response);
});

Route::get('/coins/{id}', function (string $id, CryptocurrencyInterface $cryptocurrencyService) {
    try {
        $response = $cryptocurrencyService->getCoin($id);
    } catch (\Throwable $th) {
        return Response::json(["error" => $th->getCode(), "error_message" => $th->getMessage()], $th->getCode());
    }

    return Response::json($response);
});
