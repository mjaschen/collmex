<?php

namespace MarcusJaschen\Collmex;

/**
 * Laravel 5 Service Provider for Collmex PHP SDK.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 *
 * @link     https://github.com/mjaschen/collmex
 */
class CollmexServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Registers the package.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/collmex.php' => config_path('collmex.php'),
            ],
            'config'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/collmex.php', 'collmex');

        $this->registerClient();
        $this->registerRequest();
    }

    /**
     * Registers the HTTP client.
     *
     * @return void
     */
    protected function registerClient()
    {
        $this->app->singleton(
            'collmex.client',
            function () {
                return new \MarcusJaschen\Collmex\Client\Curl(
                    config('collmex.user'),
                    config('collmex.password'),
                    config('collmex.customer')
                );
            }
        );
    }

    /**
     * Registers the Collmex Request object.
     *
     * @return void
     */
    protected function registerRequest()
    {
        $this->app->singleton(
            'collmex.request',
            function ($app) {
                return new Request($app->make('collmex.client'));
            }
        );
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            'collmex.client',
            'collmex.request',
        ];
    }
}
