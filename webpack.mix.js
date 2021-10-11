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

mix.js([
        'node_modules/jquery/dist/jquery.min.js',
        'resources/js/app.js',
        'resources/js/search_product.js',
        'resources/js/search_category.js',
        'resources/js/search_order.js',
        'resources/js/search_user.js',
        'resources/js/search_admin.js',
        'resources/js/create_new_order.js',
    ],  'public/js/app.js')
    .postCss('resources/css/app.css', 'public/css', [
        
    ]);
