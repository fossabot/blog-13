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

mix.js('resources/assets/blogxer/js/script.js', 'public/js')
  .sass('resources/assets/blogxer/sass/style.scss', 'public/css')

  .js('resources/assets/blogxer/js/scripts/carousel.js', 'public/js')
  .sass('resources/assets/blogxer/sass/carousel.scss', 'public/css')


  .extract(['jquery', 'bootstrap', 'popper.js'])
  .sourceMaps()
  .version();

if (! mix.inProduction()) {
  mix.webpackConfig({
    devtool: 'source-map'
  })
}
