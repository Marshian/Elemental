<?php

namespace Humweb\Core\Messages\Presenters;

/**
 * Bootstrap.
 */
class Bootstrap extends BasePresenter
{
    public function renderMessage($type = 'info', $messages = [], $title = 'Notice')
    {
        return '<div class="alert alert-'.$type.'">'.
                '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.
                '<b>'.$title.'</b>'.
                $messages.
                '</div>';
    }
}
