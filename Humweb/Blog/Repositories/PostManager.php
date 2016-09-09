<?php namespace Humweb\Blog\Repositories;

use Humweb\Core\Data\Repositories\Manager;

/**
 * PostManager
 * 
 * @package Humweb\Blog\Repositories
 */
class PostManager extends Manager {

    protected $repositories = [
        '*' => 'Humweb\Blog\Repositories\PostRepository',
        'testing' => 'Humweb\Blog\Fakes\Repositories\PostRepository'
    ];

}