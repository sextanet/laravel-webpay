<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use SextaNet\LaravelWebpay\Commands\LaravelWebpayCommand;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
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

    public function registerBladeComponents()
    {
        Blade::component('webpay::partials.debug', 'webpay-debug');
    }

    public function registerRoutes()
    {
        Route::get('webpay/response', function () {
            $token = request('token_ws');

            if ($token) { // successfully payment
                return LaravelWebpay::commit($token);
            }

            return LaravelWebpay::responseCancelled();
        })->name('webpay.response');

        // Route::any('webpay/response', function () {
        //     $session = request('TBK_ID_SESION') ?? null;

        //     return view('webpay::retry', compact('session'));
        // })->name('webpay.response.retry');

        Route::get('webpay/retry/session/{session_id}', function (string $session_id) {
            $order = WebpayOrder::where('session_id', $session_id)->firstOrFail();

            dd('Retry order', $order);
        })->name('webpay.session.retry');

        Route::get('webpay/create', function () {
            dd('Orden cancelada. ¿Quieres crear la orden otra vez?');
        })->name('webpay.create');
    }

    public function packageRegistered()
    {
        $this->registerBladeComponents();

        $this->registerRoutes();
    }
}
