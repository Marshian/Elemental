<?php

namespace Humweb\Comments\Models;

use Config;

class Comment extends Node
{

    /**
     * Name of the table to use for this model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The fields that are fillable.
     *
     * @var array
     */
    protected $fillable = array(
        'commentable_type',
        'commentable_id',
        'body',
        'user_id',
    );


    /**
     * Defines polymorphic relationship type.
     *
     * @return mixed
     */
    public function commentable()
    {
        return $this->morphTo();
    }


    /**
     * Defines the belongsTo relationship.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Humweb\Auth\Users\User');
    }


    /**
     * Helper method to check if a comment has children.
     *
     * @return bool
     */
    public function hasChildren()
    {
        return $this->children()->count() > 0;
    }


    public static function add($body, $user_id, $commentable)
    {
        $comment = static::create(array(
            'body'             => $body,
            'user_id'          => $user_id,
            'commentable_id'   => $commentable->id,
            'commentable_type' => get_class($commentable),
        ));

        return $comment;
    }


    /**
     * Returns the validation rules for the comment.
     *
     * @param string $commentableType The namespaced model that is being commented on
     *
     * @return array
     */
    public function getRules($commentableType)
    {
        $commentableObj = new $commentableType();
        $table = $commentableObj->getTable();
        $key = $commentableObj->getKeyName();
        $rules = array(
            //'commentable_type' => 'required|in:'.implode(',', Config::get('laravel-comments::commentables')),
            'commentable_type' => 'required',
            'commentable_id'   => 'required|exists:'.$table.','.$key,
            'body'             => 'required',
        );

        return $rules;
    }


    /**
     * Returns the URL of the comment constructed based on the URL of the commentable object, plus the anchor of the
     * comment.
     *
     * @return string
     */
    public function getUrl()
    {
        $commentable = $this->commentable;

        $url = false;
        if (method_exists($commentable, 'getUrl')) {
            $url = $commentable->getUrl();
        }

        return url($url.'#C'.$this->id);
    }
}
