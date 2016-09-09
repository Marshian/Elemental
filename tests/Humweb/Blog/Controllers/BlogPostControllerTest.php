<?php

use Carbon\Carbon;


class BlogPostControllerTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Index Page
     *
     * @test
     */
    function it_should_create_a_new_post()
    {
        $postData = [
            'title' => 'Third Blog Post',
            'slug' => 'third-blog-post',
            'content_type' => 'html',
            'content_raw' => '',
            'content_html' => '<p>This is my third blog post, this is an example of the post\'s content.',
            'image' => '',
            'featured' => false,
            'status' => 1,
            'language' => 'en',
            'meta_title' => 'Third Blog Post',
            'meta_description' => '',
            'created_by' => 1,
            'updated_by' =>  1,
            'published_by' => 1,
            'published_at' => Carbon::now()->addDays(5)
        ];
        $this->withoutMiddleware();
//
//        $this->visit('/')
//             ->see('Laravel 5');
//        //$request->beADoubleOf('App\Http\Requests\Request');
////        $request->input->all()->shouldBeCalled();
//        //$this->getPost()->create($postData)->shouldBeCalled();
//        $this->postCreate($request);
    }
}
