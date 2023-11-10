<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use MarcusJaschen\Collmex\Client\ClientInterface;
use MarcusJaschen\Collmex\Client\Curl as CurlClient;

/**
 * Laravel Service Provider for Collmex PHP SDK.
 */
class CollmexServiceProvider extends IlluminateServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../config/collmex.php' => config_path('collmex.php'),
            ],
            'config'
        );
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/collmex.php', 'collmex');

        $this->registerClient();
        $this->registerRequest();
        $this->registerMultiRequest();
    }

    protected function registerClient(): void
    {
        $this->app->singleton(
            'collmex.client',
            static fn() => new CurlClient(
                config('collmex.user'),
                config('collmex.password'),
                config('collmex.customer'),
            )
        );

        $this->app->singleton(ClientInterface::class, 'collmex.client');
    }

    protected function registerRequest(): void
    {
        $this->app->singleton(
            'collmex.request',
            static fn($app) => new Request($app->make(ClientInterface::class))
        );

        $this->app->singleton(Request::class, 'collmex.request');
    }

    protected function registerMultiRequest(): void
    {
        $this->app->singleton(
            'collmex.multirequest',
            static fn($app) => new MultiRequest($app->make(ClientInterface::class))
        );

        $this->app->singleton(MultiRequest::class, 'collmex.multirequest');
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'collmex.client',
            'collmex.request',
            'collmex.multirequest',
            ClientInterface::class,
            Request::class,
            MultiRequest::class,
        ];
    }
}
