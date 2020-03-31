<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::macro('simpleDate', function($datetime) {
            return Carbon::parse($datetime)->translatedFormat("d M Y");
        });

        Carbon::macro('simpleDatetime', function($datetime) {
            return Carbon::parse($datetime)->translatedFormat("d M Y H:i");
        });
    }
}
