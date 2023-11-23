<?php

namespace App\Providers;

use App\Implementations\CoinGeckoService;
use App\Interfaces\CryptocurrencyInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CryptocurrencyInterface::class, CoinGeckoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
