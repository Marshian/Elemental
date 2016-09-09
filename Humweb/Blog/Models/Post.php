<?php namespace Humweb\Blog\Models;

use Humweb\Comments\Models\CommentableTrait;
use Humweb\Tags\Models\TaggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @package Humweb\Blog\Models
 */
class Post extends Model
{
    use TaggableTrait, CommentableTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $guarded = [];

    /**
     * Scope a query to only include active posts
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}