<?php

namespace Humweb\Shortcodes;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ShortcodeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('shortcodes', 'Humweb\Shortcodes\Parser');

        /*
       * This removes the need to add a facade in the config\app
       */
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('ShortParser', 'Humweb\Shortcodes\Facades\Shortcodes');
            Shortcodes::init();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
