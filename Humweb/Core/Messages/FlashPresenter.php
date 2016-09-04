<?php

namespace Humweb\Core\Messages;

use Humweb\Core\Messages\Presenters\Bootstrap;
use Humweb\Core\Messages\Presenters\MessagePresenterContract;
use Illuminate\Session\SessionManager;

/**
 * FlashPresenter.
 */
class FlashPresenter
{
    use SessionPrefixTrait;

    /**
     * @var Session
     */
    protected $session;

    protected $presenter;

    /**
     * @param SessionManager           $session
     * @param MessagePresenterContract $presenter
     */
    public function __construct(SessionManager $session, MessagePresenterContract $presenter = null)
    {
        $this->session = $session;
        $this->presenter = $presenter ?: new Bootstrap();
    }

    /**
     * Render messages.
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

    /**
     * @return mixed
     */
    public function getPresenter()
    {
        return $this->presenter;
    }

    /**
     * @param mixed $presenter
     */
    public function setPresenter($presenter)
    {
        $this->presenter = $presenter;
    }
}
