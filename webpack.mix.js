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
<<<<<<< HEAD
    .js('resources/js/newScript.js', 'public/js')
=======
<<<<<<< refs/remotes/DELIVEBOO_TEAM4/main
    .js('resources/js/script.js', 'public/js')
=======
    .js('resources/js/newScript.js', 'public/js')
>>>>>>> aggiunta cdn vueJs
>>>>>>> alfredo_test_
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    });
