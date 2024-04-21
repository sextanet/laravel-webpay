<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\Support\Facades\Route;
use SextaNet\LaravelWebpay\Commands\LaravelWebpayCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelWebpayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-webpay')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations([
                'create_webpay_orders_table',
                'create_webpay_responses_table',
            ])
            ->hasCommand(LaravelWebpayCommand::class);
    }

    public function packageRegistered()
    {
        Route::get('webpay/response', function () {
            $token = $_GET['token_ws'] ?? $_POST['token_ws'] ?? null;

            dd(LaravelWebpay::commit($token));
        })->name('webpay.response');

        Route::any('webpay/response', function () {
            $buy_order = request('TBK_ORDEN_COMPRA') ?? null;

            return view('webpay::retry', compact('buy_order'));
        })->name('webpay.response.retry');

        Route::get('webpay/retry/{token}', function (string $token) {
            return 'Retry order';
        })->name('webpay.retry');
    }
}
