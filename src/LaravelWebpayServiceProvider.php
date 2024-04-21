<?php

namespace SextaNet\LaravelWebpay;

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
            ->hasMigration('create_laravel-webpay_table')
            ->hasCommand(LaravelWebpayCommand::class);
    }
}
