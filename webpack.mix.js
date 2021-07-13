const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    // file relativo a index pubblico
    .js('resources/js/guest/home.js', 'public/js')
    // file relativo a profile privato degli user
    .js('resources/js/admin/profile.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
