const mix = require('laravel-mix');

mix.js('src/resources/js/app.js', 'public/js')
    .postCss('src/resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]).vue();
