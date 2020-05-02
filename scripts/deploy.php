<?php

namespace Deployer;

require 'recipe/common.php';
require 'recipe/npm.php';

set('repository', 'something...');

set('clear_paths', [
    // something...
]);

host('example.com')
    // something...
    ->stage('production')
    ->set('branch', 'master')
    ->set('deploy_path', '/home/deploy/movie-contents/client');

after('deploy:update_code', 'npm:install');
task('npm:build', 'npm run build');
task('pm2:start', 'cd {{deploy_path}} && pm2 startOrRestart ecosystem.config.js');

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
])->desc('Deploy example.com');

after('deploy', 'success');