module.exports = {
    apps : [{
      name: 'movie-contents.techvit.me',
      exec_mode : 'cluster',
      instances: 0,
      cwd: '/home/deploy/sample/current',
      script: './node_modules/nuxt-start/bin/nuxt-start.js',
      log_date_format: 'YYYY-MM-DD HH:mm Z'
    }]
  }