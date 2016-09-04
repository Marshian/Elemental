<?php

namespace Humweb\Core\Messages\Presenters;

/**
 * MessagePresenterContract.
 */
interface MessagePresenterContract
{
    /**
     * @param string $type
     * @param string $message
     * @param string $title
     *
     * @return string
     */
    public function renderMessage($type = 'info', $message = '', $title = '');

    /**
     * @param string $type
     * @param array  $messages
     *
     * @return string
     */
    public function render($type = 'info', $messages = []);

    /**
     * @return array
     */
    public function getTypes();
}
