<?php

namespace Humweb\Core\Messages\Presenters;

/**
 * AbstractPresenter.
 */
class BasePresenter implements MessagePresenterContract
{
    protected $types = ['success', 'info', 'warning', 'danger'];

    /**
     * @param string $type
     * @param string $message
     * @param string $title
     *
     * @return string
     */
    public function renderMessage($type = 'info', $message = '', $title = '')
    {
        return '<div class="alert alert-'.$type.'">'.
                '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.
                '<b>'.$title.'</b>'.
                $messages.
                '</div>';
    }

    public function render($type = 'info', $messages = [])
    {
        $str = '';

        foreach ($messages as $msg) {
            $str .= $this->renderMessage($type, $msg['message'], $msg['title']);
        }

        return $str;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param string|array $type
     */
    public function setTypes($type = '')
    {
        if (is_array($type)) {
            $this->types = $type;
        } else {
            $this->types[] = $type;
        }
    }
}
