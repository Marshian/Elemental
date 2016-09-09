<?php

namespace Humweb\Html;

use Humweb\Menus\Menu;

/**
 * AdminMenu.
 */
class AdminMenu
{
    /**
     * @var \Humweb\Modules\Module
     */
    protected $modules;


    /**
     * AdminMenu constructor.
     *
     * @param $app
     */
    public function __construct($app)
    {
        $this->modules = $app['modules'];
    }


    /**
     * Render admin menu
     *
     * @return string
     */
    public function render()
    {
        $menu = new Menu($this->modules->getAdminMenus());

        return $menu->setLabelAttribute('label')->render();
    }

}
