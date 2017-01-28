'use strict';

// import
import gulp from 'gulp';
import source from 'vinyl-source-stream';
import sass from 'gulp-sass';
import sassGlob from 'gulp-sass-glob';
import pleeease from 'gulp-pleeease';
import browserify from 'browserify';
import babelify from 'babelify';
import readConfig from 'read-config';
import watch from 'gulp-watch';
import validate from 'gulp-html-validator';

// const
const SRC = './library';
const CONFIG = './library/config';
const HTDOCS = '.';
const BASE_PATH = '/';
const DEST = `${HTDOCS}${BASE_PATH}`;

// css
gulp.task('sass', () => {
    const config = readConfig(`${CONFIG}/pleeease.json`);
    return gulp.src(`${SRC}/scss/style.scss`)
        .pipe(sassGlob())
        .pipe(sass())
        .pipe(pleeease(config))
        .pipe(gulp.dest(`${DEST}`));
});

gulp.task('css', gulp.series('sass'));

// serve
gulp.task('watch', () => {
    watch([`${SRC}/scss/**/*.scss`], gulp.series('sass'));
});

gulp.task('serve', gulp.series('watch'));

// default
gulp.task('build', gulp.parallel('css'));
gulp.task('default', gulp.series('build', 'serve'));
