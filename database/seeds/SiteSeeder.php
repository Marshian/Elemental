<?php


use App\Auth\Groups\Group;
use App\Auth\Permissions\PermissionsPresenter;
use App\Auth\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SiteSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_this = $this;

        DB::transaction(function () use ($_this)
        {

            $presenter = new PermissionsPresenter(Config::getFacadeRoot(), app()->make('modules'));

            $permissions = [];
            foreach ($presenter->getPermissions() as $section)
            {
                foreach($section as $perm => $meta)
                {
                    $permissions[$perm] = 1;
                }
            }

            // Users
            $adminUser = $_this->makeUser([
                'first_name'  => 'Joe',
                'last_name'   => 'BobAdmin',
                'email'       => 'admin@user.com',
                'password'    => 'admin!123',
                'permissions' => [],
            ]);

            $basicUser = $_this->makeUser([
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
                'title' => 'User',
                'slug' => 'user'
            ]);

            // User Group Assignment
            $adminUser->groups()->save($adminGroup);
            $basicUser->groups()->save($userGroup);
        });

        $this->_output = $output = $this->command->getOutput();
        $output->title('Starting Database Seed');


        //---------------- Create Account -------------
        $output->note('Creating content groups and pages.');

//
//        DB::table('content_groups')->insert([
//            ['title' => 'Web', 'slug' => 'web', 'position' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
//            ['title' => 'Database', 'slug' => 'database', 'position' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
//            ['title' => 'Services', 'slug' => 'services', 'position' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
//        ]);

        DB::table('posts')->insert([
        ['category_id' => 1, 'title' => 'Nginx', 'slug' => 'nginx', 'content_html' => '', 'user_id' => 1, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['category_id' => 1, 'title' => 'Workers', 'slug' => 'workers', 'content_html' => '', 'user_id' => 1, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['category_id' => 1, 'title' => 'CDN', 'slug' => 'cdn', 'content_html' => '', 'user_id' => 1, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['category_id' => 1, 'title' => 'Cache', 'slug' => 'cache', 'content_html' => '', 'user_id' => 1, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['category_id' => 2, 'title' => 'Mysql', 'slug' => 'mysql', 'content_html' => '', 'user_id' => 1, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['category_id' => 2, 'title' => 'Postgres', 'slug' => 'postgres', 'content_html' => '', 'user_id' => 1, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['category_id' => 2, 'title' => 'Redis', 'slug' => 'redis', 'content_html' => '', 'user_id' => 1, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    ]);

    }

    private function makeUser($data)
    {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

}