<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\Services\YnabApi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserSettingsInterface;
use App\Http\Controllers\UserSettingsController;

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
        Model::preventSilentlyDiscardingAttributes($this->app->isLocal());

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
        $this->app->singleton(
            UserSettingsInterface::class,
            function ()
            {
                return new UserSettingsController();
            }
        );
    }
}
