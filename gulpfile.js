"use strict";

// Load gulp
var gulp = require('gulp');

// Loads gulp plugins using $.pluginname
var $ = require('gulp-load-plugins')();

// Parallelize Operations
var parallel = require('concurrent-transform');
var os       = require("os");

// Load BrowserSync
var browserSync = require('browser-sync');

// Additional Plugins
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');

// Configuration
var destPath = 'techmunchies'
var assetPath = '/images';

gulp.task(
  'default',
  [
    'compile-styles',
    //'compile-scripts',
    //'compile-fonts',
    //'compile-images',
    //'compile-templates'
  ],
  function() {
    gulp.watch(destPath + '/_sass/**/*.scss',  ['compile-styles']);
    //gulp.watch(assetPath + '/js/**/*.js',      ['compile-scripts']);
    //gulp.watch(assetPath + '/fonts/**/*',      ['compile-fonts']);
    //gulp.watch(assetPath + '/images/**/*',     ['compile-images']);
    //gulp.watch(assetPath + '/templates/**/*',  ['compile-templates']);
  }
);

// Styles
// ------

gulp.task('compile-styles', function () {
  var plugins = [
      autoprefixer({browsers: ['last 1 version']}),
      cssnano()
  ];
  return (
    gulp.src([
      destPath + '/_sass/style.scss'
    ])
    .pipe($.sass().on('error', $.sass.logError))
    .pipe($.sourcemaps.init())
    .pipe($.postcss(plugins))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(destPath + '/'))
  );
});


// Scripts
// -------

gulp.task('compile-scripts', function () {
  return (
    gulp.src([
      assetPath + '/js/script.js'
    ])
    .pipe(concat('script.js'))
    .pipe(gulp.dest(distPath + '/js'))
  );
});

gulp.task('optimize-scripts', function () {
  return gulp.src(distPath + '/js/script.js')
    .pipe(uglify())
    .pipe(gulp.dest(distPath + '/js/'));
});



// Images
// -------

gulp.task('compile-images', function () {
  return gulp.src(assetPath + '/images/**/*')
    .pipe(gulp.dest(distPath + '/images'));
});

gulp.task('optimize-images', function () {
  return gulp.src(distPath + '/images/**/*')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(distPath + '/images'));
});



// Fonts
// -----

gulp.task('compile-fonts', function () {
  return gulp.src(assetPath + '/fonts/**/*')
    .pipe(gulp.dest(distPath + '/fonts'));
});



// Templates
// ---------

gulp.task('compile-templates', function () {
  return gulp.src(assetPath + '/templates/**/*')
    .pipe(gulp.dest(themePath));
});
