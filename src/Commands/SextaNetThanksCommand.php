<?php

namespace SextaNet\LaravelWebpay\Commands;

use Illuminate\Console\Command;

class SextaNetThanksCommand extends Command
{
    public $signature = 'sextanet:thanks';

    public $description = 'Shows a thank you message';

    public function handle(): int
    {
        $this->info("Thank you for using SextaNet's Laravel Webpay package");
        $this->info('');
        $this->comment('Do you like it? Give us a ⭐️ on GitHub!');
        $this->comment('👉 https://github.com/sextanet/laravel-webpay');

        return self::SUCCESS;
    }
}
