<?php

namespace LGL\Core\Content\Handlers;

use Illuminate\Http\Request;

/**
 * HandlePageMediaUploads
 *
 * @package LGL\Core\Content\Handlers
 */
class HandlePageTagsUpdate
{
    protected $request;


    /**
     * HandlePageMediaUploads constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Handle the event.
     *
     */
    public function handle($event)
    {
        $tags = $this->request->get('tags');

        if (count($tags)) {
            $event->page->retag($tags);
        }
    }
}