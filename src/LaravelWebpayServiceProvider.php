<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\Support\Facades\Route;
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
            ->hasMigration('create_laravel-webpay_table')
            ->hasCommand(LaravelWebpayCommand::class);
    }

    public function packageRegistered()
    {
        Route::get('webpay/response', function () {
            $token = $_GET['token_ws'] ?? $_POST['token_ws'] ?? null;

            dd(LaravelWebpay::commit($token));
        })->name('webpay.response');
    }
}
