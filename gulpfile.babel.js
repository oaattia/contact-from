import gulp from "gulp";
import browserify from "browserify";
import babelify from 'babelify';
import source from "vinyl-source-stream";
import buffer from "vinyl-buffer";
import uglify from "gulp-uglify";
import watchify from "watchify";
import sass from "gulp-sass";
import csso from "gulp-csso";

gulp.task('styling', () => {
    return gulp.src('./resources/assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(csso())
        .pipe(gulp.dest('./public/css'));
});


gulp.task('javascript', () => {
    watchify(browserify({
        entries: 'resources/assets/js/form.js',
        debug: true
    }))
    .transform(babelify)
    .bundle()
    .pipe(source('form.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest('./public/js'));
});

gulp.task('default', ['watch']);

gulp.task('watch', () => {
    gulp.watch('resources/assets/js/form.js', ['javascript']);
    gulp.watch('resources/assets/sass/**/*.scss', ['styling']);
});

