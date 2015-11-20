var elixir = require('laravel-elixir');

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
    // mix.sass('app.scss');
    mix.styles([
    	'*.css'
    ], 'public/css/vendor.css');

    mix.scripts([
        'jquery-2.1.1.min.js',
        'material.js',
        'material.min.js',
        'material.min.js.map',
    	'ripples.js',
    	'ripples.min.js',
    	'ripples.min.js.map'
        
    ], 'public/js/vendor/vendor.js')
    .scripts([
        'app.js'
    ], 'public/js/custom.js');

    mix.version(['css/vendor.css', 'js/vendor/vendor.js', 'js/custom.js']);
});
