<?php

namespace LGL\Core\Content\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use LGL\Core\Content\Models\Page;

class PageWasDeleted extends Event
{
    use SerializesModels;

    public $page;

    /**
     * Create a new event instance.
     *
     * @param  Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }
}