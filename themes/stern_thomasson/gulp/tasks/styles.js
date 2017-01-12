/* styles.js */

'use strict';

var gulp         = require('gulp');
var config       = require('../config');
var sass         = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var plumber      = require('gulp-plumber');
var browserSync  = require('browser-sync').create();
var reload       = browserSync.reload;
var notify       = require('gulp-notify');
var gutil        = require('gulp-util');


/*
    SASS COMPILE OPTIONS (set in config.js, sassOptions)
        - Docs:  https://www.npmjs.com/package/node-sass#usage-1
        - Other useful options:
            1. outputStyle: (nested | expanded | compact | compressed)
            2. quiet: true - Suppress log output except on error
            3. bourbon: https://www.npmjs.com/package/bourbon
            4. neat: https://www.npmjs.com/package/bourbon-neat

    SOURCEMAP OPTIONS (set in config.js, sourcemapsInitOptions)
        - Docs:  https://www.npmjs.com/package/gulp-sourcemaps
        1. set debug to 'true' for debugging sourcemap

    AUTOPREFIXER OPTIONS (set in config.js, autoprefixerOptions)
        - Docs:  https://www.npmjs.com/package/gulp-autoprefixer

*/

/*8
    Task: 'styles' ( This is a default task )
        1. Create Source Map
        2. Create Sass File
        3. Run Autoprefixer
        4. Write sourcemap to ./
        5. Write css to ./
        6. Reloads browser
        7. Prints success message to terminal
*/

gulp.task('styles', function(){
    return gulp.src(config.path.sass.src)
        .pipe(plumber())
        .pipe(sourcemaps.init(config.sassOptions.sourcemapsInitOptions))
        .pipe(sass(config.sassOptions).on('error', sass.logError)).on('error', notify.onError({ title: 'Sass Error', message: '❌ FAILURE! ❌', sound: 'Glass' }))
        .pipe(autoprefixer(config.sassOptions.autoprefixerOptions))
        .pipe(sourcemaps.write(config.path.sass.dest))
        .pipe(plumber.stop())
        .pipe(gulp.dest(config.path.sass.dest))
        .pipe(reload({stream: true}))
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('Styles Compiled Successfully!')); });
});

// To DO:
// check for any useful options
// configure Dev and Production Tasks