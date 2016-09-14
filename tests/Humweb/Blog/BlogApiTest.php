<?php

use Humweb\Auth\Users\User;
use Humweb\Blog\Events\PostWasCreated;
use Humweb\Blog\Events\PostWasDeleted;
use Humweb\Blog\Events\PostWasUpdated;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class BlogApiTest
 */
class BlogApiTest extends TestCase
{
    use DatabaseMigrations;

    protected $runSeeders = true;


    /**
     * @test
     */
    function it_can_get_single_post()
    {

        $user = User::find(1);

        $this->actingAs($user)->get('/api/blog/posts/1')->seeJson([
            'status'  => true,
            'message' => 'OK'
        ])->seeJsonStructure([
            'status',
            'message',
            'data' => [
                'post' => [
                    'id',
                    'title',
                    'slug',
                    'content_html',
                    'category_id',
                    'created_by',
                    'status',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
            ]
        ]);
    }


    /**
     * @test
     */
    function it_can_get_all_posts()
    {

        $user = User::find(1);

        $this->actingAs($user)->get('/api/blog/posts')->seeJson([
            'status'  => true,
            'message' => 'OK'
        ])->seeJsonStructure([
            'status',
            'message',
            'data' => [
                'posts' => [
                    '*' => [
                        'id',
                        'title',
                        'slug',
                        'content_html',
                        'category_id',
                        'created_by',
                        'status',
                        'created_at',
                        'updated_at',
                        'deleted_at'
                    ]
                ]
            ]
        ]);
    }


    /**
     * @test
     */
    function it_can_create_posts()
    {

        $user = User::find(1);

        $this->actingAs($user)->expectsEvents(PostWasCreated::class)->post('/api/blog/posts', [
            'title'        => 'Blog title new',
            'content_html' => 'Body content.',
            'category_id'  => 1,
            'status'       => 1
        ])->seeJson([
            'status'  => true,
            'message' => 'post created.',
        ]);

        $this->seeInDatabase('posts', [
            'title'        => 'Blog title new',
            'slug'         => 'blog-title-new',
            'content_html' => 'Body content.',
            'category_id'  => 1,
            'status'       => 1
        ]);
    }


    /**
     * @test
     */
    function it_can_update_posts()
    {
        $this->seeInDatabase('posts', [
            'title'       => 'Blog title 1',
            'slug'        => 'blog-title-1',
            'category_id' => 1,
            'status'      => 1
        ]);

        $user = User::find(1);

        $this->actingAs($user)->expectsEvents(PostWasUpdated::class)->post('/api/blog/posts/1', [
            'title'       => 'Blog title 1',
            'content_html' => 'Frontend web servers.'
        ])->seeJson([
            'status'  => true,
            'message' => 'post updated.',
        ])->seeJsonStructure([
            'status',
            'message',
            'data' => [
                'post' => [
                    'id',
                    'title',
                    'slug',
                    'content_html',
                    'category_id',
                    'created_by',
                    'status',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                    'published_at',
                ]
            ]
        ]);

        $this->seeInDatabase('posts', [
            'title'       => 'Blog title 1',
            'content_html' => 'Frontend web servers.'
        ]);
    }


    /**
     * @test
     */
    function it_can_delete_post()
    {
        $this->seeInDatabase('posts', [
            'id'          => 1,
            'title'       => 'Blog title 1',
            'slug'        => 'blog-title-1',
            'category_id' => 1,
            'status'      => 1,
            'deleted_at'  => null
        ]);

        $user = User::find(1);

        $this->actingAs($user)->expectsEvents(PostWasDeleted::class)->post('/api/blog/posts/delete/1')->seeJson([
            'status'  => true,
            'message' => 'post removed.',
        ]);

        $this->notSeeInDatabase('posts', [
            'id'         => 1,
            'title'      => 'Blog title 1',
            'deleted_at' => null
        ]);
    }

    //TODO: create tests `PostWasDeleted` cleanup functionality
}
