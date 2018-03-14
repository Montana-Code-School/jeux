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
    .js('resources/assets/js/p5.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('resources/assets/js/background-sketch.js', 'public/js')
    .copy('resources/assets/js/paper.js', 'public/js')
    .copy('resources/assets/js/title-sketch.js', 'public/js')
    .copy('resources/assets/js/voronoi-sketch.js', 'public/js')
    .copy('resources/assets/js/voronoi.js', 'public/js')
    .copy('resources/assets/fonts/Monofett regular.ttf', 'public/assets');
    // .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');
