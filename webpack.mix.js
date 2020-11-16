const tailwindcss = require('tailwindcss')
const mix = require('laravel-mix');

mix.js('src/app.js', 'js')
    .sass('src/app.scss', 'css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .setPublicPath('public');