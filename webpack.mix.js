const mix = require("laravel-mix");

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

mix.react("resources/js/app.js", "public/js/app.js")
    .scripts(
        ["resources/js/jquery-3.2.1.min.js"],
        "public/js/jquery-3.2.1.min.js"
    )
    .sass("resources/css/app.scss", "public/css")
    .copyDirectory("resources/imgs", "public/imgs")
    .version();
