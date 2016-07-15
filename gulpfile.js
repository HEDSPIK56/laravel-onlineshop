var gulp = require('gulp');
var elixir = require('laravel-elixir');
//var del = require('del');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {

	 gulp.src("vendor/bower_components/jquery/dist/jquery.js")
	   .pipe(gulp.dest("resources/assets/js/"));

	 gulp.src("vendor/bower_components/bootstrap/less/**")
	   .pipe(gulp.dest("resources/assets/less/bootstrap"));

	gulp.src("vendor/bower_components/eonasdan-bootstrap-datetimepicker/src/less/**")
	   .pipe(gulp.dest("resources/assets/less/bootstrap"));

	 gulp.src("vendor/bower_components/bootstrap/dist/js/bootstrap.js")
	   .pipe(gulp.dest("resources/assets/js/"));

	gulp.src("vendor/bower_components/eonasdan-bootstrap-datetimepicker/src/js/*")
	   .pipe(gulp.dest("resources/assets/js"));

	 gulp.src("vendor/bower_components/bootstrap/dist/fonts/**")
	   .pipe(gulp.dest("public/assets/fonts"));

	gulp.src("vendor/bower_components/font-awesome/fonts/**")
      .pipe(gulp.dest("public/assets/fonts"));

	gulp.src("vendor/bower_components/font-awesome/less/**")
		.pipe(gulp.dest("resources/assets/less/font-awesome"));

});

elixir(function(mix) {
    // auto sysnc when change front-end
    mix.browserSync(); 

    mix.scripts([
      'jquery.js',
      'bootstrap.js',
      'bootstrap-datetimepicker.js'],
	    'public/js/common.js').scripts(['admin/admin.common.js'], 'public/js/admin/admin.common.js')
    						.scripts(['app.js'], 'public/js/app.js');

 //  	// Compile Less
   	mix.less('common_less.less', 'resources/assets/css/common_less.css');

   	mix.sass([
        'common_sass.scss',
    ], 'resources/assets/css/common_sass.css');

    // join js file
    mix.styles([
        'common_less.css',
        'common_sass.css'
    ], 'public/css/common.css');

    // remove old file
    //mix.remove(['resources/assets/css']);
});
