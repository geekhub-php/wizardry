var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

var paths = {
    scss: ['./app/Resources/scss/*.scss']
};

gulp.task('sass', function () {
    gulp.src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./web/css'));
});

gulp.task('watch', function() {
    gulp.watch(paths.scss, ['sass']);
});
