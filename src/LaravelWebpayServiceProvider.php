<?php

namespace SextaNet\LaravelWebpay;

use Illuminate\Support\Facades\Blade;
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

    protected function registerBladeComponents()
    {
        Blade::component('webpay::partials.debug', 'webpay-debug');
    }

    protected function registerRoutes(string $file): void
    {
        $this->loadRoutesFrom(__DIR__."/routes/{$file}");
    }

    public function packageRegistered()
    {
        $this->registerBladeComponents();
        $this->registerRoutes('web.php');
    }
}
