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
   .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/blog.js', 'public/js')
    .sass('resources/sass/blog.scss', 'public/css');

//
// mix.webpackConfig({
//     module: {
//         rules: [
//             {
//                 "loader": "babel-loader",
//                 "options": {
//                     "presets": [
//                         "@babel/preset-env",
//                         "@babel/preset-react"
//                     ],
//                     "plugins": [
//                         ["@babel/plugin-proposal-decorators", { "legacy": true }],
//                         "@babel/plugin-proposal-class-properties"
//                     ]
//                 }
//             }
//         ],
//     },
//
// });
