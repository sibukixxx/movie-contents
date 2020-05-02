<?php

namespace Deployer;

ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . '/root/.composer/vendor/deployer/recipes');
ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . '/Users/sibukixxx/.config/composer/vendor/deployer/recipes');

require 'recipe/common.php';
require 'recipe/npm.php';

set('repository', 'git@github.com:sibukixxx/movie-contents.git');

set('clear_paths', [
    // something...
]);

host('movie-contents.techvit.me')
    ->stage('production')
    ->user('deploy')
    ->port(20022)
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/id_rsa')
    ->set('branch', 'master')
    ->set('deploy_path', '/home/deploy/sample');

after('deploy:update_code', 'npm:install');
task('npm:build', 'npm run build');
task('pm2:start', 'cd {{deploy_path}}/current && pm2 startOrRestart ecosystem.config.js');

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'npm:build',
    'deploy:clear_paths',
    'deploy:symlink',
    'pm2:start',
    'deploy:unlock',
    'cleanup',
])->desc('Deploy movie-contents.techvit.me');

after('deploy', 'success');