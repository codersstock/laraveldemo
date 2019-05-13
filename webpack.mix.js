const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js");
//.extract(["vue"]);
mix.combine(
    [
        "resources/jslibs/query.js",
        "resources/jslibs/bootstrap.js",

    ],
    "public/js/all.js"
);

mix.styles(
    ["resources/lib/bootstrap.css"],
    "public/css/app.css"
);