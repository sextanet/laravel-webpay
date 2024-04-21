<?php

namespace SextaNet\LaravelWebpay\Commands;

use Illuminate\Console\Command;

class LaravelWebpayCommand extends Command
{
    public $signature = 'laravel-webpay';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
