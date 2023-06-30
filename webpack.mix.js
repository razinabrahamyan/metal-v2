const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

mix.js('resources/js/vue_core.js', 'public/assets/js/vue_core.min.js')
    .js('resources/js/wizard_form.js', 'public/assets/js/wizard_form.min.js');

mix.sass('resources/css/sitemap.scss', 'public/assets/css/sitemap.css')
    .css('public/assets/css/plugins.css', 'public/assets/css/plugins.min.css')
    .purgeCss();
