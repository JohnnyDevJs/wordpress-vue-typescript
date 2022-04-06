/* eslint-disable prettier/prettier */
const mix = require('laravel-mix')

mix.ts('./src/main.ts', 'public/js/app.js').vue()
mix.sass('./src/sass/app.sass', 'public/css/app.css')
mix.browserSync({
    files: ['./**/*.php', './**/*.ts', './**/*.vue'],
    proxy: 'localhost:2022'
})