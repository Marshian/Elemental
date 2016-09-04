<?php

namespace Humweb\Breadcrumbs;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Breadcrumbs extends Collection
{
    /**
     * Add crumb to collection.
     *
     * @param string $label label for link
     * @param string $url
     *
     * @return $this
     */
    public function add($label, $url = '')
    {
        $key = Str::slug($label);
        $this->put($key, ['label' => $label, 'url' => $url]);

        return $this;
    }

    /**
     * Clear all breadcrumbs.
     *
     * @return Breadcrumb
     */
    public function clear()
    {
        $this->items = array();

        return $this;
    }

    /**
     * Render breadcrumbs.
     *
     * @param string $presenter
     *
     * @return string
     */
    public function render($presenter = null)
    {
        $presenter = strtolower($presenter);

        if (strtolower($presenter) === 'foundation') {
            $presenter = new FoundationPresenter($this);
        } else {
            $presenter = new Presenter($this);
        }

        return $presenter->render();
    }
}
