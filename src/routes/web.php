<?php

use Illuminate\Support\Facades\Route;
use SextaNet\LaravelWebpay\LaravelWebpay;
use SextaNet\LaravelWebpay\Models\WebpayOrder;

Route::get('webpay/response', function () {
    $token = request('token_ws');

    if ($token) { // successfully payment
        return LaravelWebpay::commit($token);
    }

    return LaravelWebpay::responseCancelled();
})->name('webpay.response');

// Route::any('webpay/response', function () {
//     $session = request('TBK_ID_SESION') ?? null;

//     return view('webpay::retry', compact('session'));
// })->name('webpay.response.retry');

Route::get('webpay/retry/session/{session_id}', function (string $session_id) {
    $order = WebpayOrder::where('session_id', $session_id)->firstOrFail();

    dd('Retry order', $order);
})->name('webpay.session.retry');

Route::get('webpay/create', function () {
    dd('Orden cancelada. ¿Quieres crear la orden otra vez?');
})->name('webpay.create');
