<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\View\View;
use SextaNet\LaravelWebpay\Exceptions\RejectedTransaction;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use stdClass;
use Transbank\Webpay\WebpayPlus\Transaction;

class LaravelWebpay
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
        $order = WebpayOrder::updateOrCreate([
            'buy_order' => $order->buy_order,
        ], [
            'buy_order' => $order->buy_order,
            'session_id' => $order->session_id,
            'amount' => $order->amount,
        ]);

        $response = static::instance()->create(
            $order->buy_order,
            $order->session_id,
            $order->amount,
            route('webpay.response'),
        );

        return view('webpay::create', compact('response'));
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

        if ($commit->isApproved()) {
            dd($commit);
        }

        throw new RejectedTransaction();
    }

    public static function responseTokenWsNotProvided()
    {
        return view('webpay::token_ws_not_provided');
    }
}
