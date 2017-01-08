<?php

namespace Humweb\Modules;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;

/**
 * ModuleBaseProvider.
 */
class ModuleBaseProvider extends ServiceProvider
{
    protected $moduleMeta = [
        'name' => '',
        'slug' => '',
        'version' => '',
        'author' => '',
        'email' => '',
        'website' => '',
    ];

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Base path of module.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Available permissions for module.
     *
     * @var array
     */
    protected $permissions = null;

    /**
     * Register the service provider.
     */
    public function register()
    {
    }

    public function getBasePath()
    {
        if (is_null($this->basePath)) {
            $moduleClass = new ReflectionClass($this);
            $this->basePath = dirname($moduleClass->getFilename());
        }

        return $this->basePath;
    }

    public function getResourcePath()
    {
        return $this->getBasePath().'/../resources';
    }

    public function getViewsPath()
    {
        return $this->getResourcePath().'/views';
    }

    public function getLangPath()
    {
        return $this->getResourcePath().'/lang';
    }
    public function getConfigPath()
    {
        return $this->getResourcePath().'/config';
    }

    public function loadViews()
    {
        $this->loadViewsFrom($this->getViewsPath(), $this->moduleMeta['slug']);
    }

    public function loadLang()
    {
        $this->loadTranslationsFrom($this->getLangPath(), $this->moduleMeta['slug']);
    }

    public function publishConfig()
    {
        $this->publishes([
            $this->getConfigPath('courier') => config_path('courier.php'),
        ]);
        $this->publishes([
            $this->getViewsPath() => base_path('resources/views/vendor/'.$this->moduleMeta['slug']),
        ]);
    }
    public function publishViews()
    {
        $this->publishes([
            $this->getViewsPath() => base_path('resources/views/vendor/'.$this->moduleMeta['slug']),
        ]);
    }

    public function getMetadata()
    {
        return $this->moduleMeta;
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
}
