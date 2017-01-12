/* config.js */


/*
    CONFIGURATION MODULE ** This method will be deprecated as of Gulp 4 **
        - How to setup a config file (https://blog.simpleblend.net/gulp-organization-structure/)

            1. Set the URL of your project
            2. Set Browsersync options (https://www.browsersync.io/docs/options)
            3. Set src and dest paths for files (root, php, css, sass, js)
            4. Set paths for build files (build.js)
            5. Set filenames for renaming js (scripts.js)
            6. Set Sass options (styles.js:  sass, autoprefixer, sourcemap)
            7. Set files to delete to go back to the pre-build state (reset.js)
*/

var projectURL = 'http://localhost:8888/auto-theme-test/';

module.exports = {
    browserSyncOptions: {
        proxy: projectURL,
        browsers: ['google chrome'],
        open: true,
        injectChanges: true
    },
    path: {
        root: './',
        php: {
            src: './**/*.php'
        },
        css: {
            src: './style.css'
        },
        sass: {
            src: './sass/**/*.scss',
            dest: './'
        },
        js: {
            src: './js/**/*.js',
                minify: {
                    custom: {
                        src: './js/*.js',
                        dest: './js/min/'
                    },
                    vendor: {
                        src: './js/vendor/**/*.js',
                        dest: './js/min/'
                    }

                }
        },
        images : {
            src: 'images/originals/**/*',
            dest: 'images/'
        }
    },
    build: {
        sass: {
            src: './gulp/build-files/sass/**/*.scss',
            dest: './sass/'
        },
        fonts: {
            src: './gulp/build-files/fonts/*.{tar,tar.bz2,tar.gz,zip}',
            dest: './fonts/',
            include: '**/*.{svg,ttf,otf,eot,woff,woff2}',
            css: {
                src: './gulp/build-files/fonts/*.{tar,tar.bz2,tar.gz,zip}',
                dest: './sass/typography/',
                include: '**/*.css'
            },
        },
        js: {
            src: './gulp/build-files/js/**/*.js',
            dest: './js/'
        },
        plugins: {
            src: './gulp/build-files/plugins/**/*',
            dest: '../.././plugins/'
        },
        images: {
            src: './gulp/build-files/images/*',
            dest: './images/'
        }
    },
    file: {
        name: {
            css: 'style.css',
            sass: 'style.scss',
            js: {
                custom: 'custom',
                vendor: 'vendor'
            },
            fontsSass: '_fonts.scss'
        }
    },
    sassOptions: {
        includePaths: require('node-bourbon').includePaths,
        includePaths: require('node-neat').includePaths,
        outputStyle: 'expanded',
        precision: 10,
        sourceComments: true,
        errLogToConsole: true,
        autoprefixerOptions: {
            browsers: ['last 2 versions']
        },
        sourcemapsInitOptions: {
            loadMaps: true,
            debug: false
        }
    },
    tinyPngOptions: {
        key: 'API_KEY', // replace with tinypng api key
        sigFile: './images/.tinypng-sigs',
        log: true,
        parallelMax: 10
    },
    reset: {
        sass: {
            src: './sass'
        },
        fonts: {
            src: './fonts'
        },
        js: {
            src: './js'
        },
        plugins: {
            src: '../.././plugins/**/*'
        }
    }
};
