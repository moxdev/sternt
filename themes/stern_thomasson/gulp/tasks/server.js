/* server.js */

'use-strict';

var gulp         = require('gulp');
var config       = require('../config');
var browserSync  = require('browser-sync').create();
var reload       = browserSync.reload;

/**
    BrowserSyncOptions ( set in config.js )
        1. "gulp" runs styles and script tasks to start a project
        2. opens project in browser window
        3. watches for changes to sass and reloads browser
        4. watches for changes to javascript and reloads browser
        5. watches for changes to php and reloads browser
*/

gulp.task('default', ['styles', 'scripts', 'imageMin'], function() {
    browserSync.init(config.browserSyncOptions);
    gulp.watch(config.path.sass.src,{cwd: config.path.root}, ['styles', reload]);
    gulp.watch(config.path.js.src,{cwd: config.path.root}, ['scripts', reload]);
    gulp.watch(config.path.php.src, {cwd: config.path.root}, reload);
    gulp.watch(config.path.images.src, {cwd: config.path.root}, ['imageMin']);
});


/* TO DO:
    - check for other defaults that need to run
    - how will this work with dev and production builds?
    - any other BS options? Tunnel?
*/