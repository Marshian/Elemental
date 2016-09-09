<?php

namespace spec\App\Blog\Repositories;

use PhpSpec\Laravel\LaravelObjectBehavior;
//use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoryRepositorySpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Blog\Repositories\CategoryRepository');
    }
}
