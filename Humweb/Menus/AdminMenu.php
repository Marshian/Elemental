<?php

namespace Humweb\Menus;

use Illuminate\Support\Facades\Request;

/**
 * AdminMenu.
 *
 * package Modules\Menus
 */
class AdminMenu
{
    public function item($url)
    {
        return '<li><a href="'.$url.'">'.$name.'</a></li>';
    }

    public function itemWithChildren($label = '', $url = '#', $selected = 'collapse', $icon = '', $arrow = '<span class="fa arrow"></span>')
    {
        return '<li>'.'<a href="'.$url.'">'.$icon.' <span class="nav-label">'.$label.'</span> '.$arrow.'</a>'.'<ul class="nav nav-second-level '.$selected.'">';
    }

    public static function menu($menu, $lookup)
    {
        $str = '';

        foreach ($menu as $menu_section => $menus) {
            if (!is_array($menus['items'])) {
                $str .= '<li><a href="'.$menus.'">'.$menu_section.'</a></li>';
            } else {
                $icon = $menus['icon'] ?: '<i class="fa fa-th-large" ></i>';
                $selected = (in_array(Request::url(), $lookup[$menu_section])) ? ' in' : ' collapse';
                $str .= '<li>'.'<a href = "#" >'.$icon.' <span class="nav-label">'.$menu_section.'</span> <span class="fa arrow"></span ></a>'.'<ul class="nav nav-second-level'.$selected.'">';
                foreach ($menus['items'] as $menu_link) {
                    if (isset($menu_link['divider'])) {
                        $str .= '<li class="'.$menu_link['divider'].'"></li>';
                    } elseif (isset($menu_link['label'])) {
                        $url = isset($menu_link['url']) ? $menu_link['url'] : '#';
                        $icon = isset($menu_link['icon']) ? $menu_link['icon'] : '<i class="fa fa-th-large" ></i>';
                        $str .= '<li>'.'<a href = "'.$url.'">'.$icon.' <span class="nav-label">'.$menu_link['label'].'</span >';
                    }
                    if (!empty($menu_link['children'])) {
                        $selected = (isset($menu_link['url']) && $menu_link['url'] == Request::url()) ? ' in' : ' collapse';

                        $str .= '<span class="fa arrow" ></span></a>'.'<ul class="nav nav-third-level'.$selected.'">';

                        foreach ($menu_link['children'] as $child_link) {
                            if (isset($child_link['divider'])) {
                                $str .= '<li class="'.$child_link['divider'].'"></li>';
                            } else {
                                $url = isset($child_link['url']) ? $child_link['url'] : '#';
                                $selected = (isset($child_link['url']) && $child_link['url'] == Request::url()) ? ' class="active"' : '';
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
}
