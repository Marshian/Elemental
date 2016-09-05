<?php

namespace Humweb\Auth;

use Humweb\Modules\ModuleBaseProvider;

class AuthServiceProvider extends ModuleBaseProvider
{
    protected $moduleMeta = [
        'name'    => 'Auth System',
        'slug'    => 'auth',
        'version' => '',
        'author'  => '',
        'email'   => '',
        'website' => '',
    ];

    protected $permissions = [

        // Users
        'users.create'  => [
            'name'        => 'Create Users',
            'description' => 'Create users.',
        ],
        'users.edit'    => [
            'name'        => 'Edit Users',
            'description' => 'Edit users.',
        ],
        'users.list'    => [
            'name'        => 'List Users',
            'description' => 'List users.',
        ],
        'users.delete'  => [
            'name'        => 'Delete Users',
            'description' => 'Delete users.',
        ],
        // Groups
        'groups.list'   => [
            'name'        => 'List Groups',
            'description' => 'List groups.',
        ],
        'groups.create' => [
            'name'        => 'Create Groups',
            'description' => 'Create groups.',
        ],
        'groups.edit'   => [
            'name'        => 'Edit Groups',
            'description' => 'Edit groups.',
        ],
        'groups.delete' => [
            'name'        => 'Delete Groups',
            'description' => 'Delete groups',
        ],
    ];


    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app['modules']['auth'] = $this;
        $this->loadViews();
        $this->publishViews();
    }


    public function getAdminMenu()
    {
        return [
            'Users' => [
                ['label' => 'Groups', 'url' => route('get.groups')],
                ['label' => 'Users', 'url' => route('get.users')],
            ],
        ];
    }


    public function register()
    {
    }
}