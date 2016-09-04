<?php

namespace Humweb\Html;

use Humweb\Modules\ModuleBaseProvider;

class HtmlServiceProvider extends ModuleBaseProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     */
    public function register()
    {
        $this->app->singleton('MenuAdmin', function ($app) {
            return new AdminMenu($app);
        });
    }
}
