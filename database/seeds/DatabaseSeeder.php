<?php

use Carbon\Carbon;
use Humweb\Auth\Groups\Group;
use Humweb\Auth\Permissions\PermissionsPresenter;
use Humweb\Auth\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::transaction(function () {

            $presenter = new PermissionsPresenter(app('config'), app('modules'));

            $permissions = [];
            foreach ($presenter->getPermissions() as $section) {
                foreach ($section as $perm => $meta) {
                    $permissions[$perm] = 1;
                }
            }

            // Users
            $adminUser = $this->makeUser([
                'first_name'  => 'Joe',
                'last_name'   => 'BobAdmin',
                'email'       => 'admin@user.com',
                'password'    => 'admin!123',
                'permissions' => ['foo'],
            ]);

            $basicUser = $this->makeUser([
                'first_name'  => 'John',
                'last_name'   => 'DoeUser',
                'email'       => 'user@user.com',
                'password'    => 'user!123',
                'permissions' => ['bar']
            ]);

            // Groups
            $adminGroup = Group::create([
                'name'        => 'Admin',
                'slug'        => 'admin',
                'permissions' => $permissions
            ]);

            $userGroup = Group::create([
                'name' => 'User',
                'slug' => 'user'
            ]);

            // User Group Assignment
            $adminUser->groups()->save($adminGroup);
            $basicUser->groups()->save($userGroup);
        });

        $this->seedPagesTable();

//        $this->seedPostsTable();
    }


    private function makeUser($data)
    {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }


    protected function seedPostsTable()
    {
        DB::table('posts')->insert([
            [
                'category_id'  => 1,
                'title'        => 'Blog title 1',
                'slug'         => 'blog-title-1',
                'content_html' => '',
                'created_by'   => 1,
                'status'       => 1,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now()
            ],
            [
                'category_id'  => 1,
                'title'        => 'Blog title 2',
                'slug'         => 'blog-title-2',
                'content_html' => '',
                'created_by'   => 1,
                'status'       => 1,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now()
            ]
        ]);
    }


    protected function seedPagesTable()
    {
        $content = <<<EOT
<div class="blog">
<div class="container cstm-container">
<h2 class="news">NEWS HEADLINES</h2>

<div class="row blog-img">
<div class="col-md-4 col-12"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/news1.jpg" class="img-fluid"> </a>

<div class="news-title">
<h3><a href="http://staging.marshian.com.au/#">NEWS TITLE HEADLINE</a></h3>

<h4><a href="http://staging.marshian.com.au/#">RAINBOW SIX</a></h4>
</div>
<a href="http://staging.marshian.com.au/#"> </a></div>

<div class="col-md-4 col-12"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/news2.jpg" class="img-fluid"> </a>

<div class="news-title">
<h3><a href="http://staging.marshian.com.au/#">NEWS TITLE HEADLINE</a></h3>

<h4><a href="http://staging.marshian.com.au/#">BLACK OPS 4</a></h4>
</div>
<a href="http://staging.marshian.com.au/#"> </a></div>

<div class="col-md-4 col-12"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/news3.jpg" class="img-fluid"> </a>

<div class="news-title">
<h3><a href="http://staging.marshian.com.au/#">NEWS TITLE HEADLINE</a></h3>

<h4><a href="http://staging.marshian.com.au/#">CSGO</a></h4>
</div>
<a href="http://staging.marshian.com.au/#"> </a></div>
</div>

<section class="video">
<div class="row">
<div class="col-md-6 col-lg-3 col-12">
<h2 class="news">RECENT MATCHES</h2>

<ul>
	<li class="cstm-vs">
	<div class="cstm-list"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/game.png" alt="" class="img-fluid"> <img src="/frontend/img/opposition.png" alt="" class="img-fluid"> <span>vs</span> <img src="/frontend/img/selected.png" alt="" class="img-fluid"> <span class="timing">21:07</span></a></div>
	</li>
	<li>&nbsp;</li>
	<li>&nbsp;</li>
	<li>&nbsp;</li>
</ul>
</div>

<div class="col-md-6 col-lg-4 col-12">
<h2 class="news">LIVESTREAMS</h2>

<ul>
	<li class="sick"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/sick.png" alt="" class="img-fluid"> </a>

	<p><a href="http://staging.marshian.com.au/#">sickferal</a></p>
	<a href="http://staging.marshian.com.au/#"> </a>

	<p><a href="http://staging.marshian.com.au/#">offline</a></p>
	</li>
	<li class="sick"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/sick.png" alt="" class="img-fluid"> </a>
	<p><a href="http://staging.marshian.com.au/#">sickferal</a></p>
	<a href="http://staging.marshian.com.au/#"> </a>

	<p><a href="http://staging.marshian.com.au/#">offline</a></p>
	</li>
	<li class="sick"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/sick.png" alt="" class="img-fluid"> </a>
	<p><a href="http://staging.marshian.com.au/#">sickferal</a></p>
	<a href="http://staging.marshian.com.au/#"> </a>

	<p><a href="http://staging.marshian.com.au/#">offline</a></p>
	</li>
	<li class="sick"><a href="http://staging.marshian.com.au/#"><img src="/frontend/img/sick.png" alt="" class="img-fluid"> </a>
	<p><a href="http://staging.marshian.com.au/#">sickferal</a></p>
	<a href="http://staging.marshian.com.au/#"> </a>

	<p><a href="http://staging.marshian.com.au/#">offline</a></p>
	</li>
</ul>
</div>

<div class="col-md-12 col-lg-5 col-12 cstm_video_col">
<h2 class="news">LATEST MEDIA</h2>
</div>
</div>
</section>
</div>

<div class="seperate">
<div class="row">
<div class="col-md-6 col-6">
<div class="line">&nbsp;</div>
</div>

<div class="col-md-6 col-6"><img src="/frontend/img/line-logo.png" alt="" class="img-fluid"></div>
</div>
</div>
</div>
EOT;
        DB::table('pages')->insert([
            'created_by'       => 1,
            'slug'             => Str::slug('Test title'),
            'title'            => 'Test title',
            'parent_id'        => 0,
            'uri'              => Str::slug('Test title'),
            'layout'           => 'layouts.app',
            'content'          => $content,
            'published'        => 1,
            'css'              => '',
            'js'               => '',
            'meta_title'       => 'Test title',
            'meta_description' => '',
            'is_index'         => 1,
            'order'            => 1,
        ]);
        DB::table('pages')->insert([
            'created_by'       => 1,
            'slug'             => Str::slug('Test title 2'),
            'title'            => 'Test title 2',
            'parent_id'        => 0,
            'uri'              => Str::slug('Test title 2'),
            'layout'           => '',
            'content'          => 'Default content',
            'published'        => 1,
            'css'              => '',
            'js'               => '',
            'meta_title'       => 'Test title 2',
            'meta_description' => '',
            'is_index'         => 1,
            'order'            => 1,
        ]);
        DB::table('pages')->insert([
            'created_by'       => 1,
            'slug'             => Str::slug('Test title 3'),
            'title'            => 'Test title 3',
            'parent_id'        => 0,
            'uri'              => Str::slug('Test title 3'),
            'layout'           => '',
            'content'          => 'Default content',
            'published'        => 1,
            'css'              => '',
            'js'               => '',
            'meta_title'       => 'Test title 3',
            'meta_description' => '',
            'is_index'         => 1,
            'order'            => 1,
        ]);
    }

}
