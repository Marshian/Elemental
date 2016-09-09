<?php

namespace spec\App\Blog\Repositories;

use App\Blog\Models\Post;
use Carbon\Carbon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostRepositorySpec extends ObjectBehavior
{
    function let()
    {
        $this->setModel('App\\Blog\\Models\\Post');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Blog\Repositories\PostRepository');
    }

    function it_impliments_model_and_access_contracts()
    {
        $this->shouldImplement('App\Contracts\Support\RepositoryAccess');
        $this->shouldImplement('App\Contracts\Support\RepositoryModel');
    }

    function it_should_return_null_if_record_not_found(Post $model)
    {
        $model->find(33)->shouldBeCalled();
        $this->find(33);
    }
//
//    function it_can_find_record()
//    {
//        $this->find(1)->title->shouldEqual('First Blog Post');
//    }
//
//    function it_can_create_a_record()
//    {
//        $postData = [
//             'title' => 'Third Blog Post',
//             'slug' => 'third-blog-post',
//             'content_type' => 'html',
//             'content_raw' => '',
//             'content_html' => '<p>This is my third blog post, this is an example of the post\'s content.',
//             'image' => '',
//             'featured' => false,
//             'status' => 1,
//             'language' => 'en',
//             'meta_title' => 'Third Blog Post',
//             'meta_description' => 'blog desc',
//             'created_by' => 1,
//             'updated_by' =>  1,
//             'published_by' => 1,
//             'published_at' => Carbon::now()->addDays(5)
//         ];
//        $this->create($postData)->title->shouldEqual('Third Blog Post');
//    }
//
//    function it_can_update_a_record()
//    {
//        $postData = [
//            'title' => 'New Third Blog Post',
//            'slug' => 'new-third-blog-post'
//        ];
//        $this->update(3, $postData)->shouldEqual(1);
//        $this->find(3)->title->shouldEqual('New Third Blog Post');
//    }
//
//    function it_can_return_collection_of_posts()
//    {
//        $this->all()->shouldHaveCount(3);
//    }
//
//    function it_can_delete_a_post()
//    {
//        $this->delete(3)->shouldEqual(1);
//    }
//
//    function it_can_delete_many_posts()
//    {
//        $this->deleteMany([1, 2])->shouldEqual(2);
//    }
}
