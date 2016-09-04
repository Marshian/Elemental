<?php

namespace Humweb\Shortcodes;

class Shortcodes
{
    private static $instance = [];
    private static $reg = [];

    public static function rand($pre = false, $entropy = false)
    {
        if (!$pre) {
            $pre = rand();
        }

        return uniqid($pre, $entropy);
    }

    public static function init()
    {
        self::register_tabs();
    }

    /*
     * Tabs
     * ***************************************************** */

    public static function tabs($attr, $content)
    {
        self::$reg['tab_count'] = 0;
        $return = '';
        if (!isset($attr['name'])) {
            $attr['name'] = self::rand('tabs-');
        }
        \ShortParser::parse($content);
        // dump( self::$reg['tabs']);
        if (isset(self::$reg['tabs']) && is_array(self::$reg['tabs'])) {
            foreach (self::$reg['tabs'] as $id => $tab) {
                $id = $attr['name'].'-'.$id;
                $tabs[] = '<li><a href="#'.$id.'">'.$tab['title'].'</a></li>';
                $panes[] = '<div id="'.$id.'">'.$tab['content'].'</div>';
            }
            $return .= '<div class="tabs"><ul>'.implode('', $tabs).'</ul>'.implode("\n", $panes).'</div>';
            if (!isset(self::$reg['tabs_script'])) {
                $return .= '<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" type="text/css" rel="stylesheet" />';
               // $return .= '<script>$(function() {$( ".tabs" ).tabs();});</script>';
                self::$reg['tabs_script'] = true;
            }
        }
        // Unset globals
        unset(self::$reg['tabs'], self::$reg['tab_count']);

        return $return;
    }

    public static function tab($attr, $content)
    {
        extract($attr);
        self::$reg['tabs'][] = array('title' => sprintf($title, self::$reg['tab_count']), 'content' => \ShortParser::parse($content));
    }

    public static function toggle($attr, $content)
    {
        extract(array_merge(array(
            'title' => false,
            'open' => false,
            'fancy' => false,
            'icon' => true,
            'type' => '',
        ), $attr));
        $classes = 'toggle-slide';
        if ($fancy) {
            $classes .= ' alert-message '.$fancy;
        }
        //toggle-body
        if (!$title) {
            return;
        }
        $icon = ($icon === true) ? '<span class="sprite sp-plus"></span>' : '';

        return '<h5 class="'.$classes.'">'.$icon.ucfirst($title).'</h5><div class="toggle-body">'.$content.'</div>';
    }

    /*
     * Accordion
     * ******************************************** */

    public static function spoiler($atts, $content = null)
    {
        extract(array_merge(array(
            'title' => 'Spoiler title',
            'open' => false,
            'style' => 1,
        ), $atts));

        $open_display = ($open) ? ' style="display:block"' : '';

        return '<h3><a href="#">'.$title.'</a></h3><div class="spoiler-content"'.$open_display.'>'.\ShortParser::parse($content).'</div>';
    }

    public static function accordion($atts = null, $content = null)
    {
        $return = '<div class="accordion">'.\ShortParser::parse($content).'</div>';
        if (!isset(self::$reg['accord_script'])) {
            $return .= '<script>$(function() {$( ".accordion" ).accordion();});</script>';
            self::$reg['accord_script'] = true;
        }

        return $return;
    }

    public static function alertblock_shortcode($atts, $content)
    {
        $atts['block'] = true;

        return self::alert_shortcode($atts, $content);
    }

    public static function alert_shortcode($atts = null, $content = null)
    {
        extract(array_merge(array(
            'title' => false,
            'close' => true,
            'block' => false,
            'type' => 'info',
        ), $atts));
        $out = '';

        $classes = 'alert';

        if ($close) {
            $out .= '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>';
        }

        if ($block) {
            $classes .= ' block-message';
        }
        if ($type) {
            $classes .= ' alert-'.$type;
        }
        if ($title) {
            $out .= '<h5>'.$title.'</h5>';
        }
        $out .= '<p>'.\ShortParser::parse($content).'</p>';

        return '<div class="'.$classes.'">'.$out.'</div>';
    }

    public static function register_tabs()
    {
        \ShortParser::register('tabs', 'Humweb\Shortcodes\Shortcodes::tabs');
        \ShortParser::register('tab', 'Humweb\Shortcodes\Shortcodes::tab');
        \ShortParser::register('accordion', 'Humweb\Shortcodes\Shortcodes::accordion');
        \ShortParser::register('panel', 'Humweb\Shortcodes\Shortcodes::spoiler');
        \ShortParser::register('alert', 'Humweb\Shortcodes\Shortcodes::alert_shortcode');
        \ShortParser::register('block', 'Humweb\Shortcodes\Shortcodes::alertblock_shortcode');
        \ShortParser::register('toggle', 'Humweb\Shortcodes\Shortcodes::toggle');
    }
}
