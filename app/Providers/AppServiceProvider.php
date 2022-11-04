<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\Services\YnabApi;
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
        $this->app->singleton(
            YnabApi::class,
            function ()
            {
                $client = new Client([
                    'base_uri' => 'https://api.youneedabudget.com/v1/',
                    'headers' => [
                        'Authorization' => 'Bearer ' . env('YNAB_ACCESS_TOKEN'),
                        'Content-Type' => 'application/json',
                    ],
                ]);

                return new YnabApi( $client );
            }
        );
    }
}
