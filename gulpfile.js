// Defining requirements
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var babel = require('gulp-babel');
var postcss = require('gulp-postcss');
var watch = require('gulp-watch');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var ignore = require('gulp-ignore');
var rimraf = require('gulp-rimraf');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var del = require('del');
var cleanCSS = require('gulp-clean-css');
var gulpSequence = require('gulp-sequence');
var replace = require('gulp-replace');
var autoprefixer = require('autoprefixer');

// Configuration file to keep your code DRY
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('sass', function(){
  var stream = gulp
                .src(paths.sass + '/*.scss')
                .pipe(
                  plumber({
                    errorHandler: function(err) {
                      console.log(err);
                      this.emit('end');
                    }
                  })
                )
                .pipe(sourcemaps.init({ loadmaps: true }))
                .pipe(sass({ errLogToConsole: true }))
                .pipe(postcss([autoprefixer()]))
                .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
                .pipe(gulp.dest(paths.css));
  return stream;
});

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task('watch', function() {
	gulp.watch(`${paths.sass}/**/*.scss`, gulp.series('styles'));
	gulp.watch(
		[
			`${paths.dev}/js/**/*.js`,
			'js/**/*.js',
			'!js/theme.js',
			'!js/theme.min.js'
		],
		gulp.series('scripts')
	);

	//Inside the watch task.
	gulp.watch(`${paths.imgsrc}/**`, gulp.series('imagemin-watch'));
});

// Run:
// gulp imagemin
// Running image optimizing task
gulp.task('imagemin', function() {
  gulp
    .src(`${paths.imgsrc}/**`)
    .pipe(imagemin())
    .pipe(gulp.dest(paths.img));
});

/**
 * Ensures the 'imagemin' task is complete before reloading browsers
 * @verbose
 */
gulp.task(
  'imagemin-watch',
  gulp.series('imagemin', function() {
    browserSync.reload();
  })
);

// Run:
// gulp cssnano
// Minifies CSS files
gulp.task('cssnano', function() {
  return gulp
    .src(paths.css + '/theme.css')
    .pipe(sourcemaps.init({ loadmaps: true }))
    .pipe(
      plumber({
        errorHandler: function(err) {
          console.log(err);
          this.emit('end');
        }
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(cssnano({ discardComments: { removeAll: true } }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css));
});

gulp.task('minifycss', function() {
  return gulp
    .src(`${paths.css}/theme.css`)
    .pipe(sourcemaps.init({ loadmaps: true }))
    .pipe(cleanCSS({ compatibility: '*' }))
    .pipe(
      plumber({
        errorHandler: function(err) {
          console.log(err);
          this.emit('end');
        }
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css));
});

gulp.task('cleancss', function() {
  return gulp
    .src(`${paths.css}/*.min.css`, {read: false})
    .pipe(ignore('theme.css'))
    .pipe(rimraf());
});

gulp.task('styles', function(callback) {
  gulp.series('sass', 'minifycss')(callback);
});

// Run
// gulp scripts
// Uglifies and concat all JS files into one
gulp.task('scripts', function() {
  var scripts = [
    // Start - All BS4 stuff
    `${paths.dev}/js/bootstrap4/bootstrap.bundle.js`

  ];

  gulp
    .src(scripts, { allowEmpty: true })
    .pipe(babel(
      {
        presets: ['@babel/preset-env']
      }
    ))
      .pipe(concat('theme.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest(paths.js));

    return gulp
      .src(scripts, {allowEmpty: true})
      .pipe(babel())
      .pipe(concat('theme.js'))
      .pipe(gulp.dest(paths.js));
});
