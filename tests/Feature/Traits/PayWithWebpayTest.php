<?php

use SextaNet\LaravelWebpay\Exceptions\MissingAmount;
use SextaNet\LaravelWebpay\Exceptions\MissingBuyOrder;
use SextaNet\LaravelWebpay\Traits\PayWithWebpay;

beforeEach(function () {
    $this->stubModelWithTrait = new class {
        use PayWithWebpay;
    };
});

describe('needs to implement getBuyOrderAttribute()', function () {
    test('not implemented', function () {
        $this->stubModelWithTrait->getBuyOrderAttribute();
    })->expectException(MissingBuyOrder::class);

    test('implemented', function () {
        $stub = new Class {
            use PayWithWebpay;
    
            public function getBuyOrderAttribute(): string
            {
                return 1000;
            }
        };

        expect($stub->getBuyOrderAttribute())
            ->not->toBeNull();
    });
});

describe('needs to implement getAmountAttribute()', function () {
    test('not implemented', function () {
        $this->stubModelWithTrait->getAmountAttribute();
    })->expectException(MissingAmount::class);

    test('implemented', function () {
        $stub = new Class {
            use PayWithWebpay;
    
            public function getAmountAttribute(): string
            {
                return 1000;
            }
        };

        expect($stub->getAmountAttribute())
            ->not->toBeNull();
    });
});

describe('needs to implement markAsPaidWithWebpay()', function () {
    test('not implemented (returns a the default view)', function () {
        expectViewIs(
            $this->stubModelWithTrait->markAsPaidWithWebpay(),
            view('webpay::responses.approved')
        );
    });

    test('implemented', function () {
        $stub = new Class {
            use PayWithWebpay;
    
            public function markAsPaidWithWebpay()
            {
                return true;
            }
        };

        expect($stub->markAsPaidWithWebpay())
            ->not->toBeNull();
    });
});

describe('needs to implement getBuyOrderAttribute to get getSessionIdAttribute()', function () {
    test('not implemented', function () {
        $this->stubModelWithTrait->getSessionIdAttribute();

        expect($this->stubModelWithTrait->getSessionIdAttribute())
            ->toBeNull();
    })->expectException(MissingBuyOrder::class);

    test('implemented', function () {
        $stub = new Class {
            use PayWithWebpay;
    
            public function getSessionIdAttribute(): string
            {
                return 1000;
            }
        };

        expect($stub->getSessionIdAttribute())
            ->not->toBeNull();
    });
});
