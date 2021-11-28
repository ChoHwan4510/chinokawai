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

 if(mix.inProduction()){
    mix.styles('resources/css/reset.css','public/css/reset.css').version();
    mix.styles('resources/css/baseCss.css','public/css/baseCss.css').version();
 }else{
    mix.copy('resources/js/','public/js/');
    mix.copy('resources/css/','public/css/');
    mix.copy('resources/img/','public/img/');
 }
