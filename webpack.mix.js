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

    .js('resources/js/api.js', 'public/js')


    .js('resources/js/guest/advsearch.js', 'public/js')
    // file relativo a welcome
    .js('resources/js/guest/home.js', 'public/js')
    // file relativo a guest/review
    .js('resources/js/guest/review.js', 'public/js')
    // file relativo a profile privato degli user
    .js('resources/js/admin/profile.js', 'public/js')

    .js('resources/js/admin/services.js', 'public/js')

    .js('resources/js/guest/show.js', 'public/js')



    // Fix a popper.js not found in safari (spero)
    // .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')
    // per le immaagini di background
    .options({
        processCssUrls: false
    });
