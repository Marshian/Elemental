<?php

namespace Humweb\ModulePlugin;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;
class Plugin implements PluginInterface, EventSubscriberInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
    }

    public static function getSubscribedEvents()
    {
        return array(
            'post-autoload-dump' => 'methodToBeCalled',
            // ^ event name ^         ^ method name ^
        );
    }

}
