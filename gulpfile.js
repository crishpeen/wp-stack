const fs = require('fs');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const csso = require('gulp-csso');
const del = require('del');
const eslint = require('gulp-eslint');
const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const stylelint = require('gulp-stylelint');
const uglify = require('gulp-uglify');

const paths = {
  assets: 'www/wp-content/themes/wp-stack/assets/',
  resources: 'www/wp-content/themes/wp-stack/resources/',
  templates: 'www/wp-content/themes/wp-stack/',
};

const banner = `${'/*\n'
  + 'Theme Name: wp-stack\n'
  + 'Author: Jan Kryspin\n'
  + 'Author URI: http://krysp.in/\n'
  + 'Description: wp-stack template\n'
  + 'Version: '}${new Date(Date.now()).toLocaleString()}\n`
  + '*/\n';

function reload(done) {
  browserSync.reload();
  done();
}

function cleanCSS() {
  return del(`${paths.assets}css`);
}

function lintCSS() {
  return gulp
    .src([`${paths.resources}scss/**/*.scss`])
    .pipe(stylelint({
      reporters: [
        {
          console: true,
          formatter: 'string',
        },
      ],
    }));
}

function buildCSS() {
  return gulp
    .src(`${paths.resources}scss/main.scss`)
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(concat('main.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(`${paths.assets}css`));
}

function minifyCSS() {
  return gulp
    .src(`${paths.assets}css/main.css`)
    .pipe(sourcemaps.init())
    .pipe(csso())
    .pipe(concat('main.min.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(`${paths.assets}css`))
    .pipe(browserSync.stream());
}

function cleanJS() {
  return del(`${paths.assets}dist/js`);
}

function lintJS() {
  return gulp
    .src([
      `${paths.resources}js/*.js`,
      'gulpfile.js',
    ])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failOnError());
}

function buildJS() {
  return gulp
    .src([
      `${paths.resources}js/*.js`,
    ])
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(babel({
      presets: ['env'],
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(`${paths.assets}js`));
}

function minifyJS() {
  return gulp
    .src([
      `${paths.assets}js/main.js`,
    ])
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(concat('main.min.js'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(`${paths.assets}js`));
}

function cleanImages() {
  return del(`${paths.assets}images`);
}

function copyImages() {
  return gulp
    .src(`${paths.resources}images/**`)
    .pipe(gulp.dest(`${paths.assets}images`));
}

function runBrowserSync(done) {
  browserSync.init({
    open: false,
    proxy: 'wp-stack.localhost',
  }, done);
}

function watchCSS() {
  gulp
    .watch(`${paths.resources}scss/**/*.scss`, gulp.parallel('lint-css', 'build-css'));
}

function watchJS() {
  gulp
    .watch(`${paths.resources}js/**/*.js`, gulp.series(gulp.parallel('lint-js', 'build-js'), reload));
}

function watchImages() {
  gulp
    .watch(`${paths.resources}images/**`, gulp.series(gulp.parallel('copy-images'), reload));
}

function watchTemplates() {
  gulp
    .watch(`${paths.templates}**/*.php`, reload);
}

function version(done) {
  fs.writeFile(`${paths.templates}style.css`, banner, done);
}

gulp.task('lint-css', lintCSS);
gulp.task('build-css', gulp.series(cleanCSS, buildCSS, minifyCSS));
gulp.task('lint-js', lintJS);
gulp.task('build-js', gulp.series(cleanJS, buildJS, minifyJS));
gulp.task('copy-images', gulp.series(cleanImages, copyImages));
gulp.task('watch', gulp.parallel(watchCSS, watchJS, watchImages, watchTemplates));
gulp.task('version', version);
gulp.task('default', gulp.parallel(
  'lint-css',
  'build-css',
  'lint-js',
  'build-js',
  'copy-images',
  'version',
));
gulp.task('serve', gulp.series('default', runBrowserSync, 'watch'));
