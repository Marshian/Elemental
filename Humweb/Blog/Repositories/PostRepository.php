<?php namespace HumwebBlog\Repositories;

use Humweb\Blog\Contracts\Repositories\PostRepositoryContract;
use Humweb\Core\Data\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository implements PostRepositoryContract
{
    protected $model = Humweb\Blog\Models\Post::class;
}
