<?php

use SextaNet\LaravelWebpay\Exceptions\MissingAmount;
use SextaNet\LaravelWebpay\Exceptions\MissingBuyOrder;
use SextaNet\LaravelWebpay\Exceptions\MissingMarkAsPaidWithWebpay;

beforeEach(function () {
    $this->stubModelWithTrait = new class {
        use \SextaNet\LaravelWebpay\Traits\PayWithWebpay;
    };
});

it('needs to implement getBuyOrderAttribute()', function () {
    $this->stubModelWithTrait->getBuyOrderAttribute();
})->expectException(MissingBuyOrder::class);

it('needs to implement getAmountAttribute()', function () {
    $this->stubModelWithTrait->getAmountAttribute();
})->expectException(MissingAmount::class);

it('needs to implement markAsPaidWithWebpay()', function () {
    $this->stubModelWithTrait->markAsPaidWithWebpay();
})->expectException(MissingMarkAsPaidWithWebpay::class);
