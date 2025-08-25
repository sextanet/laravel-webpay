<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use SextaNet\LaravelWebpay\Exceptions\MissingProductionKeys;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Traits\StoreDB;
use Transbank\Webpay\WebpayPlus\Transaction;

class LaravelWebpay
{
    use StoreDB;
    
    public static function instance(): Transaction
    {
        return config('webpay.transaction_instance')
            ? static::createTransactionForProduction()
            : static::createTransactionForIntegration();
    }

    protected static function createTransactionForIntegration(): Transaction
    {
        $api_key = '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C';
        $commerce_code = '597055555532';

        return Transaction::buildForIntegration($api_key, $commerce_code);
    }

    protected static function createTransactionForProduction(): Transaction
    {
        static::checkProductionKeys();

        return Transaction::buildForProduction(config('webpay.secret_key'), config('webpay.commerce_code'));
    }

    protected static function hasKeys(): bool
    {
        return config('webpay.commerce_code') && config('webpay.secret_key');
    }

    public static function checkProductionKeys(): ?MissingProductionKeys
    {
        if (! static::hasKeys()) {
            throw new MissingProductionKeys;
        }

        return null;
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

    public static function responseCancelled()
    {
        $token = request('TBK_TOKEN');
        $order = WebpayOrder::findByToken($token)->first();

        return self::getCancelledUrl()
            ?? $order->orderable->showDefaultCancelledView();

        // $session = request('TBK_ID_SESION');

        // return view('webpay::responses.cancelled', compact('order', 'session'));
    }

    public static function responseRejected()
    {
        $token = request('token_ws');
        $order = WebpayOrder::findByToken($token)->first();

        return self::getRejectedUrl()
            ?? $order->orderable->showDefaultRejectedView();
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
