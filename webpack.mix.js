/* eslint-disable prettier/prettier */
const mix = require('laravel-mix')

mix.js('./src/js/app.js', 'public/js/app.js')
mix.sass('./src/sass/app.sass', 'public/css/app.css')
mix.browserSync({
  files: ['./**/*.php', './**/*.sass', './**/*.js'],
  proxy: 'localhost:8022'
})
mix.webpackConfig({
  watchOptions: {
    ignored: /node_modules/
  }
})
