const elixir = require('laravel-elixir');

/*require('laravel-elixir-vue');*/

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

 elixir(function(mix) {
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    mix.sass('app.scss')
        .sass('admin.scss')
        .copy(bootstrapPath + '/fonts', 'public/fonts')
        .webpack('app.js')
        .webpack('admin.js');
 });
