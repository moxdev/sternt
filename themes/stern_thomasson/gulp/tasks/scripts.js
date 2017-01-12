/* scripts.js */

'use-strict';

var gulp   = require('gulp');
var config = require('../config');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var gutil  = require('gulp-util');

/**
 * JS Concat and Minify:
 * set paths in config.js
 * 1. Concat all JS in ./js/vendor folder and minify to ./js/min
 * 2. Concat all JS in ./js folder and minify to ./js/min
 */

gulp.task('vendorJS', function() {
    var stream = gulp.src(config.path.js.minify.vendor.src)
        .pipe(concat(config.file.name.js.vendor + '.js'))
        .pipe(rename({
            basename: config.file.name.js.vendor,
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest(config.path.js.minify.vendor.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('vendorJS Minified Successfully!')); });
});

gulp.task('customJS', ['vendorJS'], function() {
    var stream=  gulp.src(config.path.js.minify.custom.src)
        .pipe(concat(config.file.name.js.custom + '.js'))
        .pipe(rename({
            basename: config.file.name.js.custom,
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest(config.path.js.minify.custom.dest))
    return stream
        .on('end', function(){ gutil.log(gutil.colors.bgGreen('customJS Minified Successfully!')); });
});

gulp.task('scripts', ['vendorJS', 'customJS']);

/**
 * TO DO:
 * is this dev or production task?
 * change message
 */
