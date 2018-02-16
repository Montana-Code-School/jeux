let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/bootstrap.js', 'public/js')
    .js('resources/assets/js/featherlight.js', 'public/js')
    .js('resources/assets/js/jquery-3.3.1.js', 'public/js')
    .js('resources/assets/js/jquery.flip.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');
