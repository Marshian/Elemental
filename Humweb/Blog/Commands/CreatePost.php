<?php

namespace Humweb\Blog\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Humweb\Blog\Commands\Traits\PersistentCommand;
use Humweb\Blog\Events\PageWasCreated;
use Humweb\Blog\Models\Page;

/**
 * CreatePage
 *
 * @package Humweb\Blog\Commands
 */
class CreatePost implements SelfHandling
{
    use PersistentCommand, ValidatesRequests;

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'        => 'required|string',
        'description' => 'string|max:255',
        'content'     => 'string',
        'status'      => 'int|min:1|max:4',
        'position'    => 'int',
        'group_id'    => 'int',
        'user_id'     => 'int|required',
        'is_enabled'  => 'bool'
    ];


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
            'user_id'     => $this->getUserId(),
            'group_id'    => $request->get('group_id', 0),
            'status'      => $request->get('status', 1),
            'position'    => $request->get('position', 0),
        ];
        

        // Validate
        $request->merge($data);
        $this->validate($request, $this->rules);

        // Create page
        $page = Page::create($data);

        // Trigger event
        event(new PageWasCreated($page));

        return $page;
    }

}