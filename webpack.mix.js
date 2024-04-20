const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/home.js', 'public/js/home.js')
    .js('resources/js/swap/main.js', 'public/js/swap.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/_variables.scss', 'public/css');
