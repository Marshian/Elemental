<?php

namespace Humweb\Blog\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Humweb\Blog\Commands\Traits\PersistentCommand;
use Humweb\Blog\Events\PageWasDeleted;
use Humweb\Blog\Models\Page;

/**
 * CreatePage
 *
 * @package Humweb\Blog\Commands
 */
class DeletePage implements SelfHandling
{
    use PersistentCommand, ValidatesRequests;

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'        => 'string',
        'description' => 'string|max:255',
        'status'      => 'int|min:1|max:4',
        'position'    => 'int',
        'group_id'    => 'int'
    ];

    protected $id;

    /**
     * Construct data
     *
     * @param \Illuminate\Http\Request $data
     * @param                          $id
     */
    public function __construct(Request $data, $id)
    {
        $this->data = $data;
        $this->id   = $id;
    }

    /**
     * Execute the command.
     *
     */
    public function handle()
    {

        // Delete page
        $page = Page::find($this->id);

        if (is_null($page)) {
            return false;
        }

        $page->delete();

        // Trigger event
        event(new PageWasDeleted($page));

        return $page;
    }

}