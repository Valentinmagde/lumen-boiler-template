<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/rsync.php';
use Deployer\Exception\GracefulShutdownException;

set('repository', 'https://github.com/Valentinmagde/lumen-boiler-template.git');
set('application', 'API V2');
set('ssh_multiplexing', true);

set('rsync_src', function () {
    return __DIR__;
});

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

add('rsync', [
    'exclude' => [
        '.git',
        '/.env',
        '/storage/',
        '/vendor/',
        '/node_modules/',
        '.github',
        'deploy.php',
    ],
]);

task('deploy:secrets', function () {
    file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
    upload('.env', get('deploy_path') . '/shared');
});

host('production')
    ->set('hostname', '137.184.133.101')
    ->set('remote_user', 'root')
    ->set('labels', ['stage' => 'production'])
    ->set('deploy_path', '/var/www/lumen-boiler-template');

host('staging')
    ->set('hostname', '137.184.133.101')
    ->set('remote_user', 'root')
    ->set('port', '22')
    ->set('labels', ['stage' => 'staging'])
    ->set('deploy_path', '/var/www/lumen-boiler-template');

// desc('Deploy the application');
// task('deploy', [
//     'deploy:info',
//     'deploy:prepare',
//     'deploy:release',
//     'rsync',
//     'deploy:secrets',
//     'deploy:shared',
//     'deploy:vendors',
//     'deploy:writable',
//     'artisan:storage:link',
//     'artisan:view:cache',
//     'artisan:config:cache',
//     'artisan:migrate',
//     'artisan:queue:restart',
//     'deploy:symlink',
//     'deploy:cleanup',
// ]);

// desc('Prepares a new release');
// task('deploy:prepare', [
//     'deploy:info',
//     'deploy:setup',
//     'deploy:lock',
//     'deploy:release',
//     'deploy:update_code',
//     'deploy:shared',
//     'deploy:writable',
// ]);

// desc('Publishes the release');
// task('deploy:publish', [
//     'deploy:symlink',
//     'deploy:unlock',
//     'deploy:cleanup',
//     'deploy:success',
// ]);

desc('Locks deploy');
task('deploy:lock', function () {
    $user = escapeshellarg(get('user'));
    $locked = run("[ -f {{deploy_path}}/.dep/deploy.lock ] && echo +locked ||
    echo $user > {{deploy_path}}/.dep/deploy.lock");
    if ($locked === '+locked') {
        $lockedUser = run("cat {{deploy_path}}/.dep/deploy.lock");
        throw new GracefulShutdownException(
            "Deploy locked by $lockedUser.\n" .
            "Execute \"deploy:unlock\" task to unlock."
        );
    }
});

desc('Unlocks deploy');
task('deploy:unlock', function () {
    run("rm -f {{deploy_path}}/.dep/deploy.lock");//always success
});

desc('Checks if deploy is locked');
task('deploy:is_locked', function () {
    $locked = test("[ -f {{deploy_path}}/.dep/deploy.lock ]");
    if ($locked) {
        $lockedUser = run("cat {{deploy_path}}/.dep/deploy.lock");
        throw new GracefulShutdownException("Deploy is locked by $lockedUser.");
    }
    info('Deploy is unlocked.');
});

desc('Deploys your project');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',
    'deploy:publish',
]);

after('deploy:failed', 'deploy:unlock');
