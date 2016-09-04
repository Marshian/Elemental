<?php

namespace Humweb\Core\Messages\Facades;

class Flash extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flash.messages';
    }
}
