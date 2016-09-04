<?php

namespace Humweb\Core\Messages;

use Humweb\Core\Messages\Presenters\Bootstrap;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * ServiceProvider.
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {

        // Register flash messenger
        $this->app->singleton('flash.messages', function ($app) {
            $presenter = new Bootstrap();

            return new Flash($app['session'], $presenter);
        });

        AliasLoader::getInstance()->alias('Flash', 'Humweb\Core\Messages\Facades\Flash');
    }
}
