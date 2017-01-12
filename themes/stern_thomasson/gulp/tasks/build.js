/* build.js */

'use strict';

var gulp             = require('gulp');
var config           = require('../config');
var concat           = require('gulp-concat');
var unzip            = require('gulp-unzip');
var minimatch        = require('minimatch');
var prompt           = require('gulp-prompt');
var notify           = require('gulp-notify');
var gutil            = require('gulp-util');
var del              = require('del');
var readlineSync     = require('readline-sync');
var runSequence      = require('run-sequence');

/*
    BUILD INITIAL PROJECT FILE STRUCTURE

        - 'build' task should only be run at the beginning of the project as it will overwrite any existing sass, js, fonts, plugins
        - user will be prompted in terminal before 'build' runs as a safeguard

    Order of Build:
        1. 'buildSass': Builds the ./sass directory in root
        2. 'buildFonts': Extracts the fonts from .zip and places them in ./fonts directory
        3. 'buildFontsCss': Extracts the fonts .css from .zip, concats all.css and places them in ./sass/typography/_fonts.scss directory
        4. 'clean:js': Deletes the _underscores default JS files from the js folder
        5. 'buildJS': Builds the custom ./js directory in root
        6. 'buildPlugins': Copies all plugins to the WordPress plugins folder
        7. run 'gulp build' in terminal to run all 6 tasks in the proper order and create the initial setup for your project

       - Docs: https://github.com/gulpjs/gulp/blob/master/docs/API.md#async-task-support

*/

gulp.task('buildSass', function() {
    var stream = gulp.src(config.build.sass.src)
        .pipe(gulp.dest(config.build.sass.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('buildSass: Task Successful!')); });
});

gulp.task('buildFonts', ['buildSass'], function() {
    var stream = gulp.src(config.build.fonts.src)
        .pipe(unzip({
            filter: function(entry) {
                return minimatch(entry.path, config.build.fonts.include)
            }
        }))
        .pipe(gulp.dest(config.build.fonts.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('buildFonts: Task Successful!')); });
});

gulp.task('buildFontsCss', ['buildFonts'], function() {
    var stream = gulp.src(config.build.fonts.css.src)
        .pipe(unzip({
            filter: function(entry) {
                return minimatch(entry.path, config.build.fonts.css.include)
            }
        }))
        .pipe(concat(config.file.name.fontsSass))
        .pipe(gulp.dest(config.build.fonts.css.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('buildFontsCss: Task Successful!')); });
});

gulp.task('clean:js', function () {
    return del([
        './js/customizer.js',
        './js/navigation.js',
        './js/skip-link-focus-fix.js'
    ]);
});

gulp.task('buildJS', ['buildFontsCss'], function() {
    var stream = gulp.src(config.build.js.src)
        .pipe(gulp.dest(config.build.js.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('buildJS: Task Successful!')); });
});

gulp.task('buildPlugins', ['buildJS'], function() {
    var stream = gulp.src(config.build.plugins.src)
        .pipe(gulp.dest(config.build.plugins.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('buildPlugins: Task Successful!')); });
});

gulp.task('buildImages', ['buildPlugins'], function() {
    var stream = gulp.src(config.build.images.src)
        .pipe(gulp.dest(config.build.images.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('buildImages: Task Successful!')); })
        .pipe(notify({ message: 'Build is Complete! ✅', onLast: true }));

})

gulp.task('build-prompt', function(done) {
    if (readlineSync.keyInYN(gutil.colors.bgRed('This will overwrite your sass, fonts, and js. Are you sure you want to run the "build" task?'))) {
        return done();
    }
    gutil.log(gutil.colors.bgRed('Ok, build task canceled.'));
    process.exit(1);
});

gulp.task('build', function(callback) {
  runSequence(
    'build-prompt',
    [
        'buildSass',
        'buildFonts',
        'buildFontsCss',
        'clean:js',
        'buildJS',
        'buildPlugins',
        'buildImages'
    ],
    callback
  );
});

// TODO:
// error checking?
