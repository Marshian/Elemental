<?php

namespace Humweb\Core\Messages;

use Humweb\Core\Messages\Presenters\MessagePresenterContract;
use Illuminate\Session\SessionManager;

/**
 * Flash.
 */
class Flash
{
    use SessionPrefixTrait;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var FlashPresenterContract
     */
    protected $presenter;

    /**
     * @param SessionManager           $session
     * @param MessagePresenterContract $presenter
     */
    public function __construct(SessionManager $session, MessagePresenterContract $presenter)
    {
        $this->session = $session;
        $this->presenter = $presenter;
    }

    /**
     * @param string $message
     * @param string $title
     */
    public function success($message = '', $title = '')
    {
        $this->flash($message, 'success', $title);
    }

    /**
     * @param string $message
     * @param string $title
     */
    public function danger($message = '', $title = '')
    {
        $this->flash($message, 'danger', $title);
    }

    /**
     * @param string $message
     * @param string $title
     */
    public function warning($message = '', $title = '')
    {
        $this->flash($message, 'warning', $title);
    }

    /**
     * @param string $message
     * @param string $title
     */
    public function info($message = '', $title = '')
    {
        $this->flash($message, 'info', $title);
    }

    /**
     * Add a flash message to the session.
     *
     * @param string $message
     * @param string $type
     * @param string $title
     */
    public function flash($message = '', $type = 'info', $title = 'Notice')
    {
        $key = $this->sessionPrefix($type);

        $payload = [
            'type' => $type,
            'title' => $title,
            'message' => $message,
        ];

        if ($this->session->has($key)) {
            $collection = $this->session->get($key);
            $collection[] = $payload;
            $this->session->flash($key, $collection);
        } else {
            $this->session->flash($key, [$payload]);
        }
    }

    /**
     * Render flash messages.
     *
     * @return string
     */
    public function render()
    {
        $str = '';
        $types = $this->presenter->getTypes();
        foreach ($types as $type) {
            $key = $this->sessionPrefix($type);

            if ($this->session->has($key)) {
                $str .= $this->presenter->render($type, $this->session->get($key));
            }
        }

        return $str;
    }
}
