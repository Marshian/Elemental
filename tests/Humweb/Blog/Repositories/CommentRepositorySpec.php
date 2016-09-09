<?php

namespace spec\App\Blog\Repositories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommentRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Blog\Repositories\CommentRepository');
    }
}
