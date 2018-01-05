<?php
/**
 * Laravel 5 Service Provider for Collmex PHP SDK.
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 *
 * @link      https://github.com/mjaschen/collmex
 */

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
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/collmex.php', 'collmex');

        $this->registerClient();
        $this->registerRequest();
    }

    /**
     * Registers the HTTP client.
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
    public function provides()
    {
        return array(
            'collmex.client',
            'collmex.request',
        );
    }
}
