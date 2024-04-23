<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\View\View;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use stdClass;
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

    public static function create(stdClass $orderClass): View
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

        return view('webpay::redirect', compact('order'));
    }

    public static function createManually(string $buy_order, string $session_id, string $amount): View
    {
        $response = static::instance()->create(
            $buy_order,
            $session_id,
            $amount,
            route('webpay.response'),
        );

        return view('webpay::create', compact('response'));
    }

    public static function commit(string $token)
    {
        $commit = static::instance()
            ->commit($token);

        $store = static::storeResponse($commit);

        if ($commit->isApproved()) {
            return view('webpay::authorized', compact('store'));
        }

        return static::responseRejected();
    }

    public static function responseRejected()
    {
        $token = request('token_ws');
        $order = WebpayOrder::whereToken($token)->firstOrFail();

        return view('webpay::rejected', compact('order'));
    }

    public static function responseTokenWsNotProvided()
    {
        $token = request('TBK_TOKEN');
        $order = WebpayOrder::whereToken($token)->firstOrFail();

        return view('webpay::token_ws_not_provided', compact('order'));
    }
}
