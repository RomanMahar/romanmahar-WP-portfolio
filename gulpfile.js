var gulp   = require('gulp'),
		sass = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		browserSync = require('browser-sync'),
		reload      = browserSync.reload;

gulp.task('default', ['browser-sync', 'styles', 'watch']);

gulp.task('styles', function() {
	gulp.src('wp-content/themes/roman/sass/style.scss')
		.pipe(sass({
	  	"sourcemap=none": true
	  }))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
		.pipe(gulp.dest('wp-content/themes/roman/'))
		.pipe(reload({stream: true}));
});


gulp.task('browser-sync', function() {
	browserSync({
		server: { baseDir: "./" }
	});
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
	// gulp.watch('js/**/*.js', ['jshint']);
	gulp.watch('wp-content/themes/roman/sass/**/*.scss', ['styles']);
	gulp.watch('**/*.html', reload);
});