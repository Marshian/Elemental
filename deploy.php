<?php
namespace Deployer;

require 'recipe/composer.php';
require 'recipe/laravel.php';

// Project name
set('application', 'elemental');

// Project repository
set('repository', 'git@github.com:Marshian/elemental.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);
set('composer_options', 'install --verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader');
set('bin/composer', '/usr/bin/composer');
// Hosts

host('elemental')
    ->set('branch', 'staging')
    ->set('deploy_path', '/srv/users/elemental/apps/elemental-staging');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
