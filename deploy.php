<?php

namespace Deployer;

use RuntimeException;

require 'recipe/laravel.php';
require 'contrib/rsync.php';

set('repository', 'https://github.com/Valentinmagde/lumen-boiler-template.git');
set('application', 'API V2');
set('ssh_multiplexing', true);

set('rsync_src', function () {
    return __DIR__;
});

// add('shared_files', []);
// add('shared_dirs', []);
// add('writable_dirs', []);

// add('rsync', [
//     'exclude' => [
//         '.git',
//         '/.env',
//         '/storage/',
//         '/vendor/',
//         '/node_modules/',
//         '.github',
//         'deploy.php',
//     ],
// ]);

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
    ->set('deploy_path', '/var/www/api-beachcomber-v3');

set('lock_path', '{{deploy_path}}/deploy.lock');

task('deploy:lock', function () {
    $res = run('[ -f {{lock_path}} ] && echo Locked || echo OK');

    if (trim($res) === "Locked") {
        run('rm -f {{lock_path}}');
        // throw new RuntimeException("Deployement is locked.");
    }

    run('touch {{lock_path}}');
});

task('deploy:unlock', function () {
    $res = run('[ -f {{lock_path}} ] && echo Locked || echo OK');

    if (trim($res) === "Locked") {
        run('rm {{lock_path}}');
    }
});

task('deploy:secrets', function () {
    file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
    upload('.env', get('deploy_path') . '/shared');
});

task('deploy:prepare', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
])->desc('Prepares a new release');

task('deploy:publish', [
    'deploy:secrets',
    'deploy:vendors',
    'artisan:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'deploy:cleanup',
    'deploy:success',
     
])->desc('Publishes the release');

task('deploy', [
    'deploy:prepare',
    'deploy:publish'
])->desc('Deploy the application');

after('deploy:prepare', 'deploy:lock');
after('deploy:symlink', 'deploy:unlock');
after('deploy:failed', 'deploy:unlock');
