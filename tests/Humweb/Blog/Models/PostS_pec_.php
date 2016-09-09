<?php namespace spec\App\Blog\Models;

use PhpSpec\Laravel\EloquentModelBehavior;
use Prophecy\Argument;

class PostSpec extends EloquentModelBehavior {

    public function it_should_have_category_relationship()
    {
        $this->category()->shouldDefineRelationship('belongsToMany', 'App\Blog\Models\Category');
    }

    public function it_should_have_tags_relationship()
    {
        $this->tagged()->shouldDefineRelationship('morphToMany', 'App\Tags\Models\Tag');
    }

    public function it_should_get_posts()
    {
        $this->find(1)->shouldHaveKey('title');
    }

    public function it_should_throw_exceptions_for_unknown_post_id()
    {
        $this->find(33)->shouldReturn(null);
        $this->shouldThrow('\Illuminate\Database\Eloquent\ModelNotFoundException')->during('findOrFail' ,[33]);
    }
}