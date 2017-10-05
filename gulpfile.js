var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')(),
    pngquant = require('imagemin-pngquant'),
    browserSync = require('browser-sync'),
    sassdoc = require('sassdoc'),
    fs = require('fs'),
    path = require('path'),
    merge = require('merge-stream'),
    runSequence = require('run-sequence'),
    stylelint = require("stylelint"),
    scssParser = require('postcss-scss');

var PATHS = {
    localhost: '',
    images: {
        dest: 'images/',
        templatedir: 'src/images/template',
        spritesdir: 'src/images/sprites/'
    },
    sass: {
        src: 'src/scss/',
        dest: '.'
    },
    js: {
        src: 'src/js/',
        dest: 'js/'
    },
    docs: {
        dest: 'docs/scss/'
    }
}

function getFolders(dir) {
    return fs.readdirSync(dir)
        .filter(function(file) {
            return fs.statSync(path.join(dir, file)).isDirectory();
        });
}

var onError = function (error) {
    plugins.util.beep();
    console.log(plugins.util.colors.red(error));
    this.emit('end');
};

gulp.task('default', ['sass', 'sasslint', 'browser-sync', 'images'], function () {
    gulp.watch(PATHS.sass.src + '**/*.scss', ['sass', 'sasslint']);
    gulp.watch(PATHS.images.templatedir + '**/*', ['imagemin']);
    gulp.watch(PATHS.images.spritesdir + '**/*', ['sprite']);
    gulp.watch(PATHS.js.src + '**/*', ['js']);
});

gulp.task('sasslint', function() {
    var processors = [
        stylelint()
    ];

    gulp.src([PATHS.sass.src + '**/*.scss', '!' + PATHS.sass.src + 'utils/mixins/spritesmith/**/*.scss'])
        .pipe(plugins.postcss(processors, {syntax: scssParser}));
});

gulp.task('sass', function () {
    return gulp.src(PATHS.sass.src + '**/*.scss')
        .pipe(plugins.plumber({
            errorHandler: onError
        }))
        .pipe(plugins.changed('css'))
        .pipe(plugins.sass({
            outputStyle: 'expanded'
        }))
        .pipe(plugins.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest(PATHS.sass.dest))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('sprite', function() {
    var folders = getFolders(PATHS.images.spritesdir);

    var tasks = folders.map(function(folder) {
        return gulp.src(PATHS.images.spritesdir + folder + '/**/*.png')
            .pipe(plugins.spritesmith({
                imgName: folder + '.png',
                cssName: '../../scss/utils/mixins/spritesmith/_' + folder + '.scss',
                imgPath: '../images/template/' + folder + '.png?' + Date.now(),
                padding: 30,
                cssFormat: 'scss'
            }))
            .pipe(gulp.dest(PATHS.images.templatedir));
    });

    return merge(tasks);
});

gulp.task('imagemin', function () {
    return gulp.src(PATHS.images.templatedir + '**/*')
        .pipe(plugins.changed(PATHS.images.dest))
        .pipe(plugins.size())
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(PATHS.images.dest))
        .pipe(plugins.size());
});

gulp.task('images', function() {
    runSequence('sprite', 'imagemin');
});

gulp.task('js', function () {
    return gulp.src(PATHS.js.src + '**/*.js')
        .pipe(plugins.sourcemaps.init())
        .pipe(plugins.eslint({
            configFile: '.eslintrc'
        }))
        .pipe(plugins.eslint.format())
        .pipe(plugins.jscs())
        .pipe(plugins.babel())
        .pipe(plugins.sourcemaps.write('.'))
        .pipe(gulp.dest(PATHS.js.dest));
});

gulp.task('browser-sync', function() {
    browserSync({
        server: true,
        proxy: PATHS.localhost
    });
});

// A custom task to compile through SassDoc API.
gulp.task('sassdoc', function () {
    // Tip: you don't need to pass every options,
    // just override the one you need.
    var config = {
        'verbose': true,
        'display': {
            'access': ['public', 'private'],
            'alias': true,
            'watermark': true
        },
        'groups': {
            'undefined': 'Ungrouped',
            'foo': 'Foo group',
            'bar': 'Bar group'
        },
        'package': './package.json',
        'theme': 'default',
        'basePath': 'https://github.com/SassDoc/sassdoc'
    };

    // Return a Promise.
    return gulp.src(PATHS.sass.src + '**/*.scss')
        .pipe(sassdoc(config));
});