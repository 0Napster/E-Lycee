var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
    rename      = require('gulp-rename'),
    cssmin      = require('gulp-minify-css'),
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    jshint      = require('gulp-jshint'),
    scsslint    = require('gulp-sass-lint'),
    cache       = require('gulp-cached'),
    prefix      = require('gulp-autoprefixer'),
    browserSync = require('browser-sync'),
    reload      = browserSync.reload,
    size        = require('gulp-size'),
    imagemin    = require('gulp-imagemin'),
    pngquant    = require('imagemin-pngquant'),
    plumber     = require('gulp-plumber'),
    notify      = require('gulp-notify'),
    sourcemaps  = require('gulp-sourcemaps');

var path = {
    'resources': {
        'sassFront': './resources/assets/sass/front',
        'sassBack': './resources/assets/sass/back',
        'js': './resources/assets/js',
        'jsFront': './resources/assets/js/front/',
        'jsBack': './resources/assets/js/back/',
        'images': './resources/assets/images'
    },
    'public': {
        'css': './public/assets/css',
        'js': './public/assets/js',
        'images': './public/assets/images'
    },
    'sass': './resources/assets/sass/**/*.scss',
    'js': './resources/assets/js/**/*.js',
    'views': './resources/views/**/*.php',
    'images': './resources/assets/images/**/**'
};


gulp.task('scssFront', function() {
    var onError = function(err) {
        notify.onError({
            title:    "Gulp",
            subtitle: "Failure!",
            message:  "Error: <%= error.message %>",
            sound:    "Beep"
        })(err);
        this.emit('end');
    };

    return gulp.src(path.resources.sassFront + '/app.scss')
        .pipe(plumber({errorHandler: onError}))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(prefix())
        .pipe(rename('app-front.css'))
        .pipe(gulp.dest(path.public.css))
        .pipe(reload({stream:true}))
        .pipe(cssmin())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.public.css))
});

gulp.task('scssBack', function() {
    var onError = function(err) {
        notify.onError({
            title:    "Gulp",
            subtitle: "Failure!",
            message:  "Error: <%= error.message %>",
            sound:    "Beep"
        })(err);
        this.emit('end');
    };

    return gulp.src(path.resources.sassBack + '/app.scss')
        .pipe(plumber({errorHandler: onError}))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(prefix())
        .pipe(rename('app-back.css'))
        .pipe(gulp.dest(path.public.css))
        .pipe(reload({stream:true}))
        .pipe(cssmin())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.public.css))
});

gulp.task('browser-sync', function() {
    browserSync({
        files:["public/**"],
        proxy: "http://e-lycee",
        host: "http://e-lycee"
    });
});

gulp.task('jsBack', function () {
    gulp.src(
        [
            path.resources.jsBack + 'moment.min.js',
            path.resources.jsBack + 'daterangepicker.js',
            path.resources.jsBack + 'pnotify.js',
            path.resources.jsBack + 'pnotify.buttons.js',
            path.resources.jsBack + 'autosize.min.js',
            path.resources.jsBack + 'app.js'
        ])
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(size({gzip: true, showFiles: true}))
        .pipe(concat('app-back.min.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.public.js))
        .pipe(reload({stream: true}));
});

gulp.task('jsFront', function () {
    gulp.src(
        [
            path.resources.jsFront + 'jquery.min.js',
            path.resources.jsFront + 'skel.min.js',
            path.resources.jsFront + 'util.js',
            path.resources.jsFront + 'main.js'
        ])
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(size({gzip: true, showFiles: true}))
        .pipe(concat('app-front.min.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.public.js))
        .pipe(reload({stream: true}));
});

gulp.task('scss-lint', function() {
    gulp.src(path.resources.sass + '/**/*.scss')
        .pipe(cache('scsslint'))
        .pipe(scsslint());
});

gulp.task('jshint', function() {
    gulp.src(path.resources.js + '/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

gulp.task('watch', function() {
    gulp.watch(path.resources.sassFront + '/**/*.scss', ['scssFront']);
    gulp.watch(path.resources.sassBack + '/**/*.scss', ['scssBack']);
    gulp.watch(path.resources.jsFront + '/*.js', ['jsFront', 'jshint']);
    gulp.watch(path.resources.jsBack + '/*.js', ['jsBack', 'jshint']);
    gulp.watch(path.resources.images + '*', ['imgmin']);
});

gulp.task('imgmin', function () {
    return gulp.src(path.resources.images + '**/**')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(path.public.images));
});

gulp.task('default', ['browser-sync', 'jsFront', 'jsBack', 'imgmin', 'scssFront', 'scssBack', 'watch']);