<?php

namespace Humweb\Modules\Comments\Controllers;

use Humweb\Core\Controllers\FrontController;
use Humweb\Modules\Comments\Models\Comment;
use Auth;
use Crypt;
use Input;
use Redirect;
use Validator;

class CommentsController extends FrontController
{
    /**
     * @var Comment
     */
    protected $comment;

    /**
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        parent::__construct();
        $this->comment = $comment;
    }

    /**
     * Saves a comment.
     *
     * @throws Exception
     *
     * @return \Redirect
     */
    public function postCreate()
    {
        $return = Input::get('return');
        if (empty($return)) {
            return Redirect::to('/');
        }
        try {
            $commentable = Input::get('commentable');
            if (empty($commentable)) {
                throw new Exception();
            }
            $commentable = Crypt::decrypt($commentable);
            if (strpos($commentable, '.') == false) {
                throw new Exception();
            }
            list($commentableType, $commentableId) = explode('.', $commentable);
            if (!class_exists($commentableType)) {
                throw new Exception();
            }
            $data = array(
                'commentable_type' => $commentableType,
                'commentable_id' => $commentableId,
                'body' => Input::get('body'),
                'user_id' => $this->currentUser->id,
                //'user_id' => Auth::user()->id,
            );
            $rules = $this->comment->getRules($commentableType);
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return Redirect::to($return)->withErrors($validator);
            }
            $this->comment->fill($data);
            $this->comment->save();
            $newCommentId = $this->comment->id;

            return Redirect::to($return.'#C'.$newCommentId);
        } catch (\Exception $e) {
            return Redirect::to($return.'#')
                           ->with('error', 'Unexpected Error: '.$e->getMessage());
        }
    }
}
