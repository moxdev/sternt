/* gulpfile.js

  The sole purpose of this file is to bootstrap our build
  process. Rather than manage one giant configuration file,
  each task has been separated into its own file in gulp/tasks.
  Any files in that directory get automatically required below.

*/

'use strict';

/*
  One of the current limitations of using require() is the way
  in which it searches for the files it needs. The below
  package will speed up the build process by caching the paths
  to the required files.

  Learn more here:
    - https://kev.inburke.com/kevin/node-require-is-dog-slow
    - http://glebbahmutov.com/blog/faster-node-app-require

*/
require('cache-require-paths');

// Require all tasks in gulp/tasks recursively
var requireDir = require('require-dir');
requireDir('./gulp/tasks', { recurse: true });

/*
    THIS PROJECT IS BASED ON USING THE UNDERSCORES.ME ( http://underscores.me/ ) WORDPRESS STARTER THEME ( NO SASS )
    LIST OF GULP TASKS
        1. 'gulp' : runs the default tasks 'styles', 'scripts', and starts the BrowserSync server watching for changes
        2. 'gulp styles' : compiles Sass into CSS, runs Autoprefixer, creates sourcemap and styles.css in project root DIR
        3. 'gulp scripts' : concats and minifys JS
        4. 'gulp reset' : deletes all previous Build files ( use to reset and re-build initial project )
*/

// TO DO:
// Check this out: npm install --save-dev gulp-header
