var gulp                     = require('gulp');
var config                   = require('../config');
var notify                   = require('gulp-notify');
var newer                    = require('gulp-newer');
var imagemin                 = require('gulp-imagemin');
var tinypng                  = require('gulp-tinypng-compress');

gulp.task('imageMin', function () {
    gulp.src(config.path.images.src)
        .pipe(tinypng(config.tinyPngOptions))
        .pipe(gulp.dest(config.path.images.dest));
});

// TO DO:
//  instructions
//