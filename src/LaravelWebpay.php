<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\View\View;
use SextaNet\LaravelWebpay\Exceptions\RejectedTransaction;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use stdClass;
use Transbank\Webpay\WebpayPlus\Responses\TransactionCommitResponse;
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

    public static function storeOrder($order)
    {
        return WebpayOrder::updateOrCreate([
            'buy_order' => $order->buy_order,
        ], [
            'buy_order' => $order->buy_order,
            'session_id' => $order->session_id,
            'amount' => $order->amount,
        ]);
    }

    public static function create(stdClass $order): View
    {
        static::storeOrder($order);

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

    public static function storeResponse(TransactionCommitResponse $response)
    {
        $order = WebpayOrder::findByBuyOrder($response->getBuyOrder())
            ->firstOrFail();

        $array = [
            'vci' => $response->getVci(),
            'status' => $response->getStatus(),
            'response_code' => $response->getResponseCode(),
            'amount' => $response->getAmount(),
            'authorization_code' => $response->getAuthorizationCode(),
            'payment_type_code' => $response->getPaymentTypeCode(),
            'accounting_date' => $response->getAccountingDate(),
            'installments_number' => $response->getInstallmentsNumber(),
            'installments_amount' => $response->getInstallmentsAmount(),
            'session_id' => $response->getSessionId(),
            'buy_order' => $response->getBuyOrder(),
            'card_number' => $response->getCardNumber(),
            'card_detail' => $response->getCardDetail(),
            'transaction_date' => $response->getTransactionDate(),
            'balance' => $response->getBalance(),
        ];

        return $order->responses()->create($array);
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
        return view('webpay::token_ws_not_provided');
    }
}
