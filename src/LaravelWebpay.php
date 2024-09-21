<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use SextaNet\LaravelWebpay\Exceptions\RouteDoesNotExists;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use Transbank\Webpay\WebpayPlus\Transaction;

class LaravelWebpay extends BaseWebpay
{
    public static function instance(): Transaction
    {
        $instance = new Transaction;

        if (! config('webpay.in_production')) {
            return $instance;
        }

        static::checkConfig();

        return $instance->configureForProduction(
            config('webpay.commerce_code'),
            config('webpay.secret_key')
        );
    }

    public static function checkConfig(): void
    {
        if (! config('webpay.commerce_code') || ! config('webpay.secret')) {
            throw new \Exception('Commerce code and secret key are required when you are in production mode');
        }
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
            return static::responseApproved($store);
        }

        return static::responseRejected();
    }

    public static function responseApproved($store)
    {
        return $store->order->orderable->markAsPaidWithWebpay();
    }

    public static function responseRejected(): View
    {
        $token = request('token_ws');
        $order = WebpayOrder::findByToken($token)->first();

        dd($order);

        return view('webpay::responses.rejected', compact('order'));
    }

    public static function responseCancelled()
    {
        $token = request('TBK_TOKEN');
        $order = WebpayOrder::findByToken($token)->first();

        return self::getCancelledUrl()
            ?? $order->orderable->showDefaultCancelledView();

        // $session = request('TBK_ID_SESION');

        // return view('webpay::responses.cancelled', compact('order', 'session'));
    }

    public static function setUrlByType(string $type, string $url): void
    {
        session()->flash($type, $url);
    }

    public static function getUrlByType(string $type): ?RedirectResponse
    {
        return session($type)
            ? redirect(session($type))
            : null;
    }

    public static function setCancelledUrl(string $url): void
    {
        self::setUrlByType(config('webpay.sessions.cancelled_url'), $url);
    }
    
    public static function getCancelledUrl(): ?RedirectResponse
    {
        return self::getUrlByType(config('webpay.sessions.cancelled_url'));
    }

    public static function setRejectedUrl(string $url): void
    {
        self::setUrlByType(config('webpay.sessions.rejected_url'), $url);
    }
    
    public static function getRejectedUrl(): ?RedirectResponse
    {
        return self::getUrlByType(config('webpay.sessions.rejected_url'));
    }
}
