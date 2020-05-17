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

mix.js('resources/assets/blog/js/script.js', 'public/js')
  .sass('resources/assets/blog/sass/style.scss', 'public/css')

  .js('resources/assets/blog/js/show.js', 'public/js')
  .js('resources/assets/blog/js/scripts/map.js', 'public/js')
  // .sass('resources/assets/blog/sass/carousel.scss', 'public/css')


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
mix.options({
  hmrOptions: {
    host: 'blog.test',  // site's host name
    port: 8080,
  }
});

// // fix css files 404 issue
mix.webpackConfig({
  // add any webpack dev server config here
  devServer: {
    proxy: {
      host: '0.0.0.0',  // host machine ip
      port: 8080,
    },
    watchOptions:{
      aggregateTimeout:200,
      poll:5000
    },

  }
});
