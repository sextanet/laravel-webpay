<?php

namespace SextaNet\LaravelWebpay\Traits;

use SextaNet\LaravelWebpay\Models\WebpayOrder;
use Transbank\Webpay\WebpayPlus\Responses\TransactionCommitResponse;

trait StoreDB
{
    public static function storeOrder($order)
    {
        return WebpayOrder::updateOrCreate([
            'buy_order' => $order->buy_order,
        ], [
            'buy_order' => $order->buy_order,
            'session_id' => $order->session_id,
            'amount' => $order->amount,
            'orderable_type' => get_class($order),
            'orderable_id' => $order->id,
        ]);
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
}
