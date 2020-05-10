const mix = require('laravel-mix');
require('laravel-mix-purgecss');
require('laravel-mix-polyfill');

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

  .js('resources/assets/blogxer/js/scripts/map.js', 'public/js')
  // .sass('resources/assets/blogxer/sass/carousel.scss', 'public/css')


  .js('resources/assets/admin/js/admin.js', 'public/js')
  .sass('resources/assets/admin/sass/admin.scss', 'public/css')

  .js('resources/assets/admin/js/editor.js', 'public/js')
  .sass('resources/assets/admin/sass/editor.scss', 'public/css')

  .js('resources/assets/admin/js/datatables.js', 'public/js')

  .extract(['jquery', 'bootstrap', 'popper.js'])
  .sourceMaps()
  // .purgeCss()
  .options({
    // purifyCss: true,
    autoprefixer: {
      options: {
        browsers: [
          'last 6 versions',
        ]
      }
    }
  })
  .polyfill({
    enabled: true,
    useBuiltIns: "usage",
    targets: {"firefox": "50", "ie": 11}
  })
  .version();

if (! mix.inProduction()) {
  mix.webpackConfig({
    devtool: 'source-map'
  })
}
