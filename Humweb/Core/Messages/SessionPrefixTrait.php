<?php

namespace Humweb\Core\Messages;

/**
 * SessionPrefixTrait.
 */
trait SessionPrefixTrait
{
    /**
     * @var string
     */
    protected $sessionPrefix = 'message.flash';

    /**
     * @return string
     */
    public function sessionPrefix($name = '')
    {
        return $this->sessionPrefix.'.'.$name;
    }

    /**
     * @param string $sessionPrefix
     */
    public function setSessionPrefix($sessionPrefix)
    {
        $this->sessionPrefix = $sessionPrefix;
    }
}
