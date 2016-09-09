<?php

namespace LGL\Core\Content\Handlers;

use Illuminate\Http\Request;
use LGL\Core\Content\Models\Page;

/**
 * HandlePageMediaUploads
 *
 * @package LGL\Core\Content\Handlers
 */
class HandlePageUpdateRelationships
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
        // Attach file
        $related = $this->request->get('related');
        if (count($related) && $pages = Page::select('id')->whereIn('id', $related)->get()) {
            $event->page->syncRelated(collect($pages));
        }
        else {
            $event->page->syncRelated([]);
        }
    }
}