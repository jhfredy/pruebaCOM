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

mix.styles([
    'public/vendor/nucleo/css/nucleo.css',
    'public/vendor/@fortawesome/fontawesome-free/css/all.min.css',
    'public/css/argon.css?v=1.0.0'
], 'public/css/styleAllBackend.css')

.scripts([
        'public/vendor/jquery/dist/jquery.min.js',
        'public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
        'public/vendor/chart.js/dist/Chart.min.js',
        'public/vendor/chart.js/dist/Chart.extension.js',
        'public/js/argon.js?v=1.0.0',
    ], 'public/js/scriptAllBackend.js')
    .js([
        'resources/assets/js/app.js'
    ], 'public/js/vueCompilado/appBackendVue.js');
