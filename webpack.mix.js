let mix = require('laravel-mix');

mix.js('resources/js/app.js','js/app.js')
    .sass('resources/sass/app.scss','css/app.css')
    .sourceMaps();
