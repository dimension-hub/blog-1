'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');

const paths = {
  scss: 'styles/scss/**',
  css: 'styles/scss/styles.scss'
};

gulp.task('sass', function () {
  return gulp.src(paths.css)
      .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError))
      .pipe(sourcemaps.write('./maps'))
      .pipe(gulp.dest('./styles/css/'));
});

gulp.task('watch', function () {
  gulp.watch(paths.scss, ['sass']);
});

gulp.task('default', ['watch', 'sass']);
