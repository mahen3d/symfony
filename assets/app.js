/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

//jquery files
import $ from 'jquery';
global.$ = $;

// start the Stimulus application
import './bootstrap';

console.log('Hello Webpack Encore! Mahen assets/js/app.js');

//$('.dropdown-toggle').dropdown();

$(function($) {
    // Will be true if Bootstrap 3-4 is loaded, false if Bootstrap 2 or no Bootstrap
    var bootstrap_enabled = (typeof $().emulateTransitionEnd == 'function');
    //alert (bootstrap_enabled);
});