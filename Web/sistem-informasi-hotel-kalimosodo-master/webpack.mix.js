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

// mix.js('resources/js/app.js', 'public/js');
// .postCss('resources/css/app.css', 'public/css', [
//     //
// ]);

mix.js("resources/js/facility.js", "public/js").sourceMaps();
mix.js("resources/js/room.js", "public/js").sourceMaps();
mix.js("resources/js/user.js", "public/js").sourceMaps();
mix.js("resources/js/blog.js", "public/js").sourceMaps();
mix.js("resources/js/room-type.js", "public/js").sourceMaps();
mix.js("resources/js/reservation.js", "public/js").sourceMaps();
mix.js("resources/js/userReservation.js", "public/js").sourceMaps();
