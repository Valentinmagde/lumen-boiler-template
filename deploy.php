<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/rsync.php';

use Deployer\Exception\ConfigurationException;
use Deployer\Exception\RunException;

set('repository', 'https://github.com/Valentinmagde/lumen-boiler-template.git');
set('application', 'API V2');
set('ssh_multiplexing', true);

// set('rsync_src', function () {
//     return __DIR__;
// });

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

// task('deploy:secrets', function () {
//     file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
//     upload('.env', get('deploy_path') . '/shared');
// });

// host('production')
//     ->set('hostname', '137.184.133.101')
//     ->set('remote_user', 'root')
//     ->set('labels', ['stage' => 'production'])
//     ->set('deploy_path', '/var/www/lumen-boiler-template');

// host('staging')
//     ->set('hostname', '137.184.133.101')
//     ->set('remote_user', 'root')
//     ->set('port', '22')
//     ->set('labels', ['stage' => 'staging'])
//     ->set('deploy_path', '/var/www/lumen-boiler-template');

// after('deploy:failed', 'deploy:unlock');

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
//     'deploy:unlock',
//     'deploy:cleanup',
// ]);

add('recipes', ['common']);

// Name of current user who is running deploy.
// If not set will try automatically get git user name,
// otherwise output of `whoami` command.
set('user', function () {
    if (getenv('CI') !== false) {
        return 'ci';
    }

    try {
        return runLocally('git config --get user.name');
    } catch (RunException $exception) {
        try {
            return runLocally('whoami');
        } catch (RunException $exception) {
            return 'no_user';
        }
    }
});

// Number of releases to preserve in releases folder.
set('keep_releases', 10);

// Repository to deploy.
// set('repository', '');

// Default timeout for `run()` and `runLocally()` functions.
//
// Set to `null` to disable timeout.
set('default_timeout', 300);

/**
 * Remote environment variables.
 * ```php
 * set('env', [
 *     'KEY' => 'something',
 * ]);
 * ```
 *
 * It is possible to override it per `run()` call.
 *
 * ```php
 * run('echo $KEY', env: ['KEY' => 'over']);
 * ```
 */
// set('env', []);

/**
 * Path to `.env` file which will be used as environment variables for each command per `run()`.
 *
 * ```php
 * set('dotenv', '{{current_path}}/.env');
 * ```
 */
// set('dotenv', false);
task('deploy:secrets', function () {
    file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
    upload('.env', get('deploy_path') . '/shared');
});

/**
 * The deploy path.
 *
 * For example can be set for a bunch of host once as:
 * ```php
 * set('deploy_path', '~/{{alias}}');
 * ```
 */
set('deploy_path', function () {
    throw new ConfigurationException('Please, specify `deploy_path`.');
});

/**
 * Return current release path. Default to {{deploy_path}}/`current`.
 * ```php
 * set('current_path', '/var/public_html');
 * ```
 */
set('current_path', '{{deploy_path}}/current');

// Path to the `php` bin.
set('bin/php', function () {
    if (currentHost()->hasOwn('php_version')) {
        return '/usr/bin/php{{php_version}}';
    }
    return which('php');
});

// Path to the `git` bin.
set('bin/git', function () {
    return which('git');
});

// Should {{bin/symlink}} use `--relative` option or not. Will detect
// automatically.
set('use_relative_symlink', function () {
    return commandSupportsOption('ln', '--relative');
});

// Path to the `ln` bin. With predefined options `-nfs`.
set('bin/symlink', function () {
    return get('use_relative_symlink') ? 'ln -nfs --relative' : 'ln -nfs';
});

// Path to a file which will store temp script with sudo password.
// Defaults to `.dep/sudo_pass`. This script is only temporary and will be deleted after
// sudo command executed.
set('sudo_askpass', function () {
    if (test('[ -d {{deploy_path}}/.dep ]')) {
        return '{{deploy_path}}/.dep/sudo_pass';
    } else {
        return '/tmp/dep_sudo_pass';
    }
});

desc('Prepares a new release');
task('deploy:prepare', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
]);

desc('Publishes the release');
task('deploy:publish', [
    'deploy:symlink',
    'deploy:unlock',
    'deploy:cleanup',
    'deploy:success',
]);

desc('Deploys your project');
task('deploy', [
    'deploy:prepare',
    'deploy:publish',
]);


/**
 * Prints success message
 */
task('deploy:success', function () {
    info('successfully deployed!');
})
    ->hidden();


/**
 * Hook on deploy failure.
 */
task('deploy:failed', function () {
})
    ->hidden();

fail('deploy', 'deploy:failed');

/**
 * Follows latest application logs.
 */
desc('Shows application logs');
task('logs:app', function () {
    if (!has('log_files')) {
        warning("Please, specify \"log_files\" option.");
        return;
    }
    cd('{{current_path}}');
    run('tail -f {{log_files}}');
})->verbose();
