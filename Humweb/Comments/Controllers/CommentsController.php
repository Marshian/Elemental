<?php

namespace Humweb\Modules\Comments\Controllers;

use Auth;
use Crypt;
use Humweb\Comments\Models\Comment;
use Humweb\Comments\Requests\CommentSaveRequest;
use Humweb\Core\Controllers\FrontController;
use Humweb\Modules\Comments\Models\Comment;
use Input;
use Redirect;
use Validator;

class CommentsController extends FrontController
{

    /**
     * @param Comment $comment
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Saves a comment.
     *
     * @param \Humweb\Comments\Requests\CommentSaveRequest $request
     *
     * @return \Redirect
     */
    public function postCreate(CommentSaveRequest $request)
    {
        $return  = $request->get('return');
        $data    = [
            'commentable_type' => $request->get('commentable_type'),
            'commentable_id'   => $request->get('commentable_id'),
            'body'             => $request->get('body'),
            'user_id'          => $this->currentUser->id,
        ];
        $comment = Comment::create($data);

        return $return ? redirect($return.'#C'.$comment->id) : back();
    }
}
