<?php

namespace Deployer;

require 'recipe/laravel.php';
// require 'recipe/rsync.php';
require 'contrib/rsync.php';

set('repository', 'https://github.com/Valentinmagde/lumen-boiler-template.git');
set('application', 'API V2');
set('ssh_multiplexing', true);

set('rsync_src', function () {
    return __DIR__;
});


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

host('kitecole.net')
  ->set('hostname', '137.184.133.101')
  ->set('remote_user', 'root')
  ->set('labels', ['stage' => 'production'])
  ->set('deploy_path', '/var/www/lumen-boiler-template');

host('kitecole.net')
  ->set('hostname', '137.184.133.101')
  ->set('remote_user', 'root')
  ->set('labels', ['stage' => 'staging'])
  ->set('deploy_path', '/var/www/lumen-boiler-template');

after('deploy:failed', 'deploy:unlock');

desc('Deploy the application');

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:secrets',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'artisan:queue:restart',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);
