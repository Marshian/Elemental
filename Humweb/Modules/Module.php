<?php

namespace Humweb\Modules;

use Illuminate\Support\Collection;

/**
 * Module.
 */
class Module extends Collection
{
    protected $adminMenus = [];
    protected $availablePermissions = [];

    public function getAdminMenus()
    {
        if (empty($this->adminMenus)) {
            //Create menu array for admin panel
            foreach ($this->items as $name => $module) {
                if (method_exists($module, 'getAdminMenu')) {
                    $this->adminMenus = array_merge_recursive($this->adminMenus, $module->getAdminMenu());
                }
            }
        }

        return $this->adminMenus;
    }

    public function getAvailablePermissions()
    {
        if (empty($this->availablePermissions)) {

            //Create menu array for admin panel
            foreach ($this->items as $name => $module) {
                if ($perms = $module->getPermissions()) {
                    $this->availablePermissions[$name] = $perms;
                }
            }
        }

        return $this->availablePermissions;
    }
}
