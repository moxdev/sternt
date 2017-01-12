/* reset.js */

'use strict';

var gulp         = require('gulp');
var config       = require('../config');
var gutil        = require('gulp-util');
var del          = require('del');
var readlineSync = require('readline-sync');
var runSequence  = require('run-sequence');

/**
 * DELETE ALL PREVIOUS BUILD FILES
 *      Use to reset all of the build files ( proceed with caution, will delete all of the files in the below directories )
 *      1. Prompts user to continue
 *      2. Deletes ( /.sass, ./fonts, ./js, WordPress plugins directory )
 */

gulp.task('clean', [], function() {
  return del([
             config.reset.sass.src,
             config.reset.fonts.src,
             config.reset.js.src,
             config.reset.plugins.src
             ], {force:true}).then(console.log(gutil.colors.bgGreen('Your project has been reset!')));
});

gulp.task('reset-prompt', function(done) {
    if (readlineSync.keyInYN(gutil.colors.bgRed('This will delete all "sass, fonts, js, plugins". Do you want to continue?'))) {
        return done();
    }
    gutil.log(gutil.colors.bgRed('Ok, build reset has been canceled.'));
    process.exit(1);
});

gulp.task('reset', function(callback) {
  runSequence(
    'reset-prompt', ['clean'],
    callback
  );
});

// TO DO:
