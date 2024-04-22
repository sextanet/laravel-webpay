<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\View\View;
use SextaNet\LaravelWebpay\Exceptions\RejectedTransaction;
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

    public static function create(stdClass $order): View
    {
        $stored_order = static::storeOrder($order);

        $response = static::instance()->create(
            $order->buy_order,
            $order->session_id,
            $order->amount,
            route('webpay.response'),
        );

        $token = $response->getToken();
        $url = $response->getUrl();

        $stored_order->addTokenWithUrl($token, $url);

        return view('webpay::create', compact('token', 'url'));
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

        // dd($commit);

        $store = static::storeResponse($commit);

        dd($store);

        // if ($commit->isApproved()) {
        //     dd($commit);
        // }

        throw new RejectedTransaction();
    }

    public static function responseTokenWsNotProvided()
    {
        $tbk_token = request('TBK_TOKEN');
        $order = WebpayOrder::whereToken($tbk_token)->firstOrFail();

        return view('webpay::token_ws_not_provided', compact('order'));
    }
}
