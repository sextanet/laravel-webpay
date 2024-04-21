<?php

namespace SextaNet\LaravelWebpay\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use SextaNet\LaravelWebpay\LaravelWebpayServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'SextaNet\\LaravelWebpay\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelWebpayServiceProvider::class,
        ];
    }

    public function migrate(... $files)
    {
        foreach ($files as $file) {
            $migration = include __DIR__."/../database/migrations/{$file}";
            $migration->up();
        }
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $this->migrate('create_webpay_orders_table.php');
        $this->migrate('create_webpay_responses_table.php');
    }
}
