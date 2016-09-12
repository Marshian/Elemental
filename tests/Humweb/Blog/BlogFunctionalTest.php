<?php

use Humweb\Auth\Users\User;
use Humweb\Blog\Events\PostWasCreated;
use Humweb\Blog\Events\PostWasDeleted;
use Humweb\Blog\Events\PostWasUpdated;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Post Map
 *
 * ['account_id' => 1, 'name' => 'Web', 'position' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
 * ['account_id' => 1, 'name' => 'Database', 'position' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
 * ['account_id' => 1, 'name' => 'Services', 'position' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
 */

/**
 * Class PostsFunctionalTest
 */
class PostsFunctionalTest extends TestCase
{

    use DatabaseMigrations;

    protected $runSeeders = true;

    /**
     * @test
     */
    function it_can_create_posts()
    {

        $user = User::find(1);

        $this->actingAs($user)
            ->visit('admin/blog/posts/create')
            ->see('Create Blog Post')

            // Create post
            ->expectsEvents(PostWasCreated::class)
            ->type('Mail', 'title')
            ->type('Test content.', 'content_html')
            ->press('Create')
            ->see('Post created.')

            // Verify it's being listed
            ->visit('admin/blog')
            ->see('Mail');
    }

    /**
     * @test
     */
    function it_can_update_posts()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->visit('/admin/blog/posts/update/1')
            ->see('Update Blog Post')

            // Sanity check
            ->see('Nginx')
            ->see('WebServices', true)

            // Update post
            ->expectsEvents(PostWasUpdated::class)
            ->type('WebServices', 'title')
            ->press('Save')
            ->see('Post updated.')
            ->see('WebServices');
    }

    /**
     * @test
     */
    function it_can_delete_posts()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->visit('admin/blog')
            ->see('Workers')

            // Sanity check
            ->expectsEvents(PostWasDeleted::class)
            ->visit('/admin/blog/posts/remove/2')
            ->seePageIs('admin/blog')
            ->see('Workers', true);
    }

}
