<?php

namespace Humweb\Breadcrumbs;

class Presenter
{
    protected $breadcrumb;

    public function __construct(Breadcrumbs $breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Render the Bootstrap breadcrumbs contents.
     *
     * @return string
     */
    public function render()
    {
        $pages = array();
        $crumbs = $this->breadcrumb->toArray();

        foreach ($crumbs as $item) {
            if (empty($item['url'])) {
                $pages[] = $this->getActiveLink($item);
            } else {
                $pages[] = $this->getLink($item);
            }
        }

        return $this->getWrapper(implode('', $pages));
    }

    public function getWrapper($items)
    {
        return '<ol class="breadcrumb">'.$items.'</ol>';
    }

    public function getLink($item)
    {
        return '<li><a href="'.$item['url'].'">'.$item['label'].'</a></li>';
    }

    public function getActiveLink($item)
    {
        return '<li class="active">'.$item['label'].'</li>';
    }
}
