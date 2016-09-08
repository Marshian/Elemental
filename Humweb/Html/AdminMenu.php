<?php

namespace Humweb\Html;

use Humweb\Menus\Menu;
use Humweb\Menus\Presenters\Bootstrap;

/**
 * AdminMenu.
 */
class AdminMenu
{
    protected $menu = [];
    protected $modules;


    /**
     * AdminMenu constructor.
     */
    public function __construct($app)
    {
        $this->modules = $app['modules'];
    }


    public function render()
    {
        if (empty($this->menu)) {
            $this->menu = $this->modules->getAdminMenus();
        }

        return (new Menu($this->menu, new Bootstrap()))->setLabelAttribute('label')->render();
    }

}
