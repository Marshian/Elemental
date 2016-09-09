<?php

namespace Humweb\Blog\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Humweb\Blog\Commands\Traits\PersistentCommand;
use Humweb\Blog\Events\PageWasUpdated;
use Humweb\Blog\Models\Page;

/**
 * CreatePage
 *
 * @package Humweb\Blog\Commands
 */
class UpdatePage implements SelfHandling
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
        'content'     => 'string',
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
        $request = $this->data();

        // Massage data
        $data = [
            'name'        => $request->get('name', ''),
            'description' => $request->get('description', ''),
            'content'     => $request->get('content', ''),
            'group_id'    => $request->get('group_id', 0),
            'status'      => $request->get('status', 1)
        ];

        if ($request->get('position', false) !== false) {
            $data['position'] = $request->get('position');
        }
        

        // Validate
        $this->validate($request, $this->rules);

        // Update page
        $page = Page::find($this->id);
        $page->fill($this->dataWithoutNull($data))->save();

        // Trigger event
        event(new PageWasUpdated($page));

        return $page;
    }

}