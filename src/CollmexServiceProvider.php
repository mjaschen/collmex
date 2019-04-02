<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex;

/**
 * Laravel 5 Service Provider for Collmex PHP SDK.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
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
    public function boot(): void
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
    public function register(): void
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
    protected function registerClient(): void
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
    protected function registerRequest(): void
    {
        $this->app->singleton(
            'collmex.request',
            function ($app) {
                return new Request($app->make('collmex.client'));
            }
        );
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'collmex.client',
            'collmex.request',
        ];
    }
}
