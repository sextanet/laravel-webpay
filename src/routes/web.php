<?php

use Illuminate\Support\Facades\Route;
use SextaNet\LaravelWebpay\LaravelWebpay;
use SextaNet\LaravelWebpay\Models\WebpayOrder;

Route::get('response', function () {
    $token = request('token_ws');

    if ($token) { // successfully payment
        return LaravelWebpay::commit($token);
    }

    return LaravelWebpay::responseCancelled();
})->name('response');

// Route::any('response', function () {
//     $session = request('TBK_ID_SESION') ?? null;

//     return view('webpay::retry', compact('session'));
// })->name('response.retry');

Route::get('retry/session/{session_id}', function (string $session_id) {
    $order = WebpayOrder::where('session_id', $session_id)->firstOrFail();

    dd('Retry order', $order);
})->name('session.retry');

// Route::get('cancelled', function () {
//     dd('Orden cancelada. ¿Quieres crear la orden otra vez?');
// })->name('cancelled');
