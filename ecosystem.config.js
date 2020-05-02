module.exports = {
    apps : [{
      name: '150.95.185.82',
      exec_mode : 'cluster',
      instances: 0,
      cwd: './current',
      script: './node_modules/nuxt-start/bin/nuxt-start.js',
      log_date_format: 'YYYY-MM-DD HH:mm Z'
    }]
  }