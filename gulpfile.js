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
    notify      = require('gulp-notify');

var path = {
    'resources': {
        'sassFront': './resources/assets/sass/front',
        'sassBack': './resources/assets/sass/back',
        'js': './resources/assets/js',
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
        .pipe(sass())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(prefix())
        .pipe(rename('app-front.css'))
        .pipe(gulp.dest(path.public.css))
        .pipe(reload({stream:true}))
        .pipe(cssmin())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(rename({ suffix: '.min' }))
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
        .pipe(sass())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(prefix())
        .pipe(rename('app-back.css'))
        .pipe(gulp.dest(path.public.css))
        .pipe(reload({stream:true}))
        .pipe(cssmin())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(path.public.css))
});

gulp.task('browser-sync', function() {
    browserSync({
        files:["public/**"],
        proxy: "http://e-lycee",
        host: "http://e-lycee"
    });
});

gulp.task('js', function() {
    gulp.src(path.resources.js + '/*.js')
        .pipe(uglify())
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest(path.public.js))
        .pipe(reload({stream:true}));
});

gulp.task('scss-lint', function() {
    gulp.src(path.resources.sass + '/**/*.scss')
        .pipe(cache('scsslint'))
        .pipe(scsslint());
});

gulp.task('jshint', function() {
    gulp.src(path.resources.js + '/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

gulp.task('watch', function() {
    gulp.watch(path.resources.sass + '/**/*.scss', ['scss']);
    gulp.watch(path.resources.js + '/*.js', ['js', 'jshint']);
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

gulp.task('default', ['browser-sync', 'js', 'imgmin', 'scssFront', 'scssBack', 'watch']);