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
                'name' => 'User',
                'slug' => 'user'
            ]);

            // User Group Assignment
            $adminUser->groups()->save($adminGroup);
            $basicUser->groups()->save($userGroup);
        });

    }

    private function makeUser($data)
    {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

}