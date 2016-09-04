<?php

namespace Humweb\Breadcrumbs;

class FoundationPresenter extends Presenter
{
    public function getWrapper($items)
    {
        return '<ul class="breadcrumbs">'.$items.'</ul>';
    }

    public function getLink($item)
    {
        return '<li><a href="'.$item['url'].'">'.$item['label'].'</a></li>';
    }

    public function getActiveLink($item)
    {
        return '<li class="current">'.$item['label'].'</li>';
    }
}
