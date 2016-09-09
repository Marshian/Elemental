<?php

namespace LGL\Core\Content\Handlers;

use Illuminate\Contracts\Cache\Repository as CacheContract;

class PageClearCache
{
    protected $cache;

    /**
     * ComponentClearCache constructor.
     *
     * @param \Illuminate\Contracts\Cache\Repository $cache
     */
    public function __construct(CacheContract $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Handle the event.
     *
     * @param $event
     */
    public function handle()
    {
        $this->cache->forget('dashboard:content:menu');
        $this->cache->forget('dashboard:content:hierarchy');
    }
}
