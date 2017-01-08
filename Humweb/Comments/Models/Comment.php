<?php

namespace Humweb\Comments\Models;

use Humweb\Auth\Users\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
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
        return $this->belongsTo(User::class);
    }


    public static function add($body, $user_id, $commentable)
    {
        $comment = static::create([
            'body'             => $body,
            'user_id'          => $user_id,
            'commentable_id'   => $commentable->getKey(),
            'commentable_type' => get_class($commentable),
        ]);

        return $comment;
    }


    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrl()
    {
        $url         = '';
        $commentable = $this->commentable;

        if (method_exists($commentable, 'getUrl')) {
            $url = $commentable->getUrl();
        }

        return url($url.'#C'.$this->id);
    }
}
