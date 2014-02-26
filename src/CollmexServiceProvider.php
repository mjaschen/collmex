<?php
/**
 * Laravel 4 Service Provider for Collmex PHP SDK
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex;

/**
 * Laravel 4 Service Provider for Collmex PHP SDK
 *
 * @category Collmex
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
class CollmexServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Registers the package
     */
    public function boot()
    {
        $this->package('mjaschen/collmex');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerClient();
        $this->registerRequest();
    }

    /**
     * Registers the HTTP client
     */
    protected function registerClient()
    {
        $this->app['collmex.client'] = $this->app->share(
            function ($app) {
                return new \MarcusJaschen\Collmex\Client\Curl(
                    $app['config']['collmex::user'],
                    $app['config']['collmex::password'],
                    $app['config']['collmex::customer']
                );
            }
        );
    }

    /**
     * Registers the Collmex Request object
     */
    protected function registerRequest()
    {
        $this->app['collmex.request'] = $this->app->share(
            function ($app) {
                return new Request($app['collmex.client']);
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