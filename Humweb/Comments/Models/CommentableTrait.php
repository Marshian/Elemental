<?php

namespace Humweb\Comments\Models;

trait CommentableTrait
{
    /**
     * Defines the polymophic hasMany / morphMany relationship between Post and Comment.
     *
     * @return mixed
     */
    public function comments()
    {
        return $this->morphMany('Humweb\Comments\Models\Comment', 'commentable');
    }

    public function addComment($body, $user_id)
    {
        return Comment::add($body, $user_id, $this);
    }
}
