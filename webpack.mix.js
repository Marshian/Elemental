const { mix } = require('laravel-mix');
const path = require('fs').path;
const webpack = require('webpack');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/frontend/js/app.js', 'public/js/frontend.js')
   .webpackConfig({
       plugins: [
               new webpack.ProvidePlugin({
                   $: 'jquery',
                   jQuery: 'jquery',
                   'window.jQuery': 'jquery',
                   Popper: ['popper.js', 'default'],
                   // In case you imported plugins individually, you must also require them here:
                   // Util: "exports-loader?Util!bootstrap/js/dist/util",
                   // Dropdown: "exports-loader?Dropdown!bootstrap/js/dist/dropdown",
               })
       ]
   })
   .sass('resources/assets/sass/app.scss', 'public/css');
