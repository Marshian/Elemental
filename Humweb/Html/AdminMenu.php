<?php

namespace Humweb\Html;

use Illuminate\Http\Request;

/**
 * AdminMenu.
 */
class AdminMenu
{
    protected $config;
    protected $menu = [];
    protected $menuLookup = [];
    protected $modules;
    protected $request;

    /**
     * AdminMenu constructor.
     */
    public function __construct($app)
    {
        $this->config = $app['config'];
        $this->request = $app['request'];
        $this->modules = $app['modules'];
    }

    public function getMenus()
    {
        if (empty($this->menu)) {
            $this->menu = $this->modules->getAdminMenus();
        }

        $stubs = $this->config->get('menus.admin.sections');

        foreach ($stubs as $key => $item) {
            if (isset($this->menu[$key])) {
                $this->menu[$key]['icon'] = isset($item['icon']) ? $item['icon'] : '';
                $this->menu[$key]['items'] = $this->menu[$key];
                foreach ($this->menu[$key] as $item) {
                    if (isset($item['url'])) {
                        $this->menuLookup[$key][] = $item['url'];
                    }

                    if ($this->hasChildItems($item)) {
                        foreach ($item['children'] as $child) {
                            $this->menuLookup[$key][] = $child['url'];
                        }
                    }
                }
            }
        }
    }
    /**
     * @param $menu_link
     *
     * @return array
     */
    protected function itemIcon($menu_link)
    {
        return isset($menu_link['icon']) ? $menu_link['icon'] : '<i class="fa fa-th-large" ></i>';
    }

    public function item($label, $url = '#')
    {
        return '<li><a href="'.$url.'">'.$label.'</a></li>';
    }

    public function itemWithChildren($label = '', $url = '#', $selected = 'collapse', $icon = '', $arrow = '<span class="caret"></span>')
    {
        return '<li>'.
                '<a href="'.$url.'" class="dropdown-toggle" data-toggle="dropdown">'.$icon.' '.$label.' '.$arrow.'</a>'.
                '<ul class="dropdown-menu '.$selected.'">';
    }

    public function render()
    {
        $this->getMenus();
        $str = '';
        $this->menu = array_reverse($this->menu);

        foreach ($this->menu as $menu_section => $menus) {
            if (isset($menus['items']) && !is_array($menus['items'])) {
                $str .= '<li><a href="'.$menus.'">'.$menu_section.'</a></li>';
            } else {
                $icon = $this->itemIcon($menus);
                $selected = (in_array($this->request->url(), $this->menuLookup[$menu_section])) ? ' in' : ' collapse';
                $str .= $this->itemWithChildren($menu_section, '#', $selected, $icon);

                foreach ($menus['items'] as $menu_link) {
                    if (isset($menu_link['divider'])) {
                        $str .= '<li class="'.$menu_link['divider'].'"></li>';
                    } elseif (isset($menu_link['label'])) {
                        $url = isset($menu_link['url']) ? $menu_link['url'] : '#';
                        $icon = self::itemIcon($menu_link);
                        $str .= '<li>'.'<a href = "'.$url.'">'.$icon.' '.$menu_link['label'];
                    }
                    if (!empty($menu_link['children'])) {
                        $selected = (isset($menu_link['url']) && $menu_link['url'] == $this->request->url()) ? ' in' : ' collapse';

                        //$str .= '<span class="fa arrow" ></span></a>'.'<ul class="dropdown-menu'.$selected.'">';
                        $str .= '<span class="fa arrow" ></span></a>'.'<ul class="">';

                        foreach ($menu_link['children'] as $child_link) {
                            if (isset($child_link['divider'])) {
                                $str .= '<li class="'.$child_link['divider'].'"></li>';
                            } else {
                                $url = isset($child_link['url']) ? $child_link['url'] : '#';
                                $selected = (isset($child_link['url']) && $child_link['url'] == $this->request->url()) ? ' class="active"' : '';
                                $str .= '<li'.$selected.'><a href = "'.$url.'">'.$child_link['label'].'</a ></li>';
                            }
                        }
                        $str .= '</ul>';
                    }
                    $str .= '</a></li>';
                }
            }
            $str .= '</ul>';
        }

        return $str.'</li>';
    }


    /**
     * @param $item
     *
     * @return bool
     */
    protected function hasChildItems($item)
    {
        return isset($item['children']) && is_array($item['children']);
    }
}
