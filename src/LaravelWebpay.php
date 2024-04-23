<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use Transbank\Webpay\WebpayPlus\Transaction;

class LaravelWebpay extends BaseWebpay
{
    public static function instance(): Transaction
    {
        $instance = new Transaction();

        if (! config('webpay.in_production')) {
            return $instance;
        }

        return $instance->configureForProduction(
            config('webpay.commerce_code'),
            config('webpay.secret_key')
        );
    }

    public static function create(Model $orderClass): View
    {
        $order = static::storeOrder($orderClass);

        $response = static::instance()->create(
            $orderClass->buy_order,
            $orderClass->session_id,
            $orderClass->amount,
            route('webpay.response'),
        );

        $token = $response->getToken();
        $url = $response->getUrl();

        $order->addTokenWithUrl($token, $url);

        return view('webpay::helpers.redirect', compact('order'));
    }

    public static function commit(string $token)
    {
        $commit = static::instance()
            ->commit($token);

        $store = static::storeResponse($commit);

        if ($commit->isApproved()) {
            return static::responseApproved();
        }

        return static::responseRejected();
    }

    public static function responseApproved(): View
    {
        return view('webpay::responses.approved', compact('store'));
    }

    public static function responseRejected(): View
    {
        $token = request('token_ws');
        $order = WebpayOrder::findByToken($token);

        return view('webpay::responses.rejected', compact('order'));
    }

    public static function responseCanceled(): View
    {
        $token = request('TBK_TOKEN');
        $order = WebpayOrder::findByToken($token);

        return view('webpay::responses.canceled', compact('order'));
    }
}
