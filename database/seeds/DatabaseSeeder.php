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
                'permissions' => [],
            ]);

            $basicUser = $this->makeUser([
                'first_name'  => 'John',
                'last_name'   => 'DoeUser',
                'email'       => 'user@user.com',
                'password'    => 'user!123',
                'permissions' => []
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

        $this->seedPostsTable();
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
        DB::table('pages')->insert([
            'created_by'       => 1,
            'slug'             => Str::slug('Test title'),
            'title'            => 'Test title',
            'parent_id'        => 0,
            'uri'              => Str::slug('Test title'),
            'layout'           => '',
            'content'          => 'Default content',
            'published'        => 1,
            'css'              => '',
            'js'               => '',
            'meta_title'       => 'Test title',
            'meta_description' => '',
            'meta_robots'      => '',
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
            'meta_robots'      => '',
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
            'meta_robots'      => '',
            'is_index'         => 1,
            'order'            => 1,
        ]);
    }

}
