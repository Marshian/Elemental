<?php

Route::post('comment/create', [
    'as' => 'post.comments.create',
    'uses' => 'Humweb\Modules\Comments\Controllers\CommentsController@postCreate',
]);
