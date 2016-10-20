var gulp = require('gulp');
var bower = require('gulp-bower');
var elixir = require('laravel-elixir');
//var browserSync = require('browser-sync').create();

gulp.task('bower', function () {
    return bower();
});

var vendors = '../../vendor/';

var paths = {
    'jquery': vendors + '/jquery/dist',
    'bootstrap': vendors + '/bootstrap/dist',
    'bootswatch': vendors + '/bootswatch/simplex',
    'fontawesome': vendors + '/font-awesome',
    'colorbox': vendors + '/jquery-colorbox',
    'dataTables': vendors + '/datatables/media',
    'dataTablesBootstrap3Plugin': vendors + '/datatables-bootstrap3-plugin/media',
    'flag': vendors + '/flag-sprites/dist',
    'metisMenu': vendors + '/metisMenu/dist',
    'datatablesResponsive': vendors + '/datatables-responsive',
    'summernote': vendors + '/summernote/dist',
    'select2': vendors + '/select2/dist',
    'jqueryui': vendors + '/jquery-ui',
    'justifiedGallery': vendors + '/Justified-Gallery/dist/',
    'jqueryValidation': vendors + '/jquery-validation/dist',
    'bootstrapValidator': vendors + '/bootstrap-validator/dist',
    'moment': vendors + '/moment/min',
    'datetimepicker': vendors + '/eonasdan-bootstrap-datetimepicker/build'
};

elixir.config.sourcemaps = false;

elixir(function (mix) {

    // Run bower install
    mix.task('bower');

    // Copy fonts straight to public
    mix.copy('resources/vendor/bootstrap/dist/fonts/**', 'public/fonts');
    mix.copy('resources/vendor/font-awesome/fonts/**', 'public/fonts');
    mix.copy('resources/vendor/summernote/dist/font/**', 'public/fonts');

    // Copy images straight to public
    mix.copy('resources/vendor/jquery-colorbox/example3/images/**', 'public/css/images');
    mix.copy('resources/vendor/jquery-ui/themes/base/images/**', 'public/css/images');


    // Copy flag resources
    mix.copy('resources/vendor/flag-sprites/dist/css/flag-sprites.min.css', 'public/css/common/flags.css');
    mix.copy('resources/vendor/flag-sprites/dist/img/flags.png', 'public/img/flags.png');

    // Define CSS Common.
    mix.styles([
        paths.bootstrap + '/css/bootstrap.css',
        paths.bootstrap + '/css/bootstrap-theme.css',
        paths.fontawesome + '/css/font-awesome.css',
        paths.bootswatch + '/bootstrap.css',
        paths.colorbox + '/example3/colorbox.css',
        paths.justifiedGallery + '/css/justifiedGallery.css',
        paths.colorbox + '/example3/colorbox.css',
        paths.dataTables + '/css/dataTables.bootstrap.css',
        paths.dataTablesBootstrap3Plugin + '/css/datatables-bootstrap3.css',
        paths.jqueryui + '/themes/base/minified/jquery-ui.min.css',
        paths.datetimepicker + '/css/bootstrap-datetimepicker.css'
        
    ], 'public/css/common/site.css');
    
    // CSS: datetimepicker
    
    // End CSS datetimepicker
    
    // Merge Site scripts.
    mix.scripts([
        paths.jquery + '/jquery.js',
        paths.bootstrap + '/js/bootstrap.js',
        paths.colorbox + '/jquery.colorbox.js',
        paths.justifiedGallery + '/js/jquery.justifiedGallery.js',
        paths.dataTables + '/js/jquery.dataTables.js',
        paths.dataTables + '/js/dataTables.bootstrap.js',
        paths.dataTablesBootstrap3Plugin + '/js/datatables-bootstrap3.js',
        paths.datatablesResponsive + '/js/dataTables.responsive.js',
        paths.select2 + '/js/select2.js',
        'bootstrap-dataTables-paging.js',
        'dataTables.bootstrap.js',
        'datatables.fnReloadAjax.js',
        paths.bootstrapValidator + '/validator.js',
        paths.moment + '/moment.min.js',
        paths.datetimepicker + '/js/bootstrap-datetimepicker.min.js'
        
    ], 'public/js/common/site.js');

    // CKEditor
    mix.scripts([
        'ckeditor.js',
        'adapters.jquery.js',
    ], 'public/js/common/ckeditor.js');
    
    // Datetimepicker JS
    // ENd datetime picker Js
    
    // Merge Admin CSSs.
    mix.styles([
        paths.metisMenu + '/metisMenu.css',
        paths.summernote + '/summernote.css',
        paths.select2 + '/css/select2.css',
        'sb-admin-2.css',
    ], 'public/css/common/admin.css');

    // Merge Admin scripts.
    mix.scripts([
        paths.metisMenu + '/metisMenu.js',
        paths.summernote + '/summernote.js',
    ], 'public/js/common/admin.js');
    

    // Template js
    mix.scripts([
    'common.js'
    ], 'public/js/common/common.js');

    // template css
    mix.sass([
        'common.scss'
    ], 'public/css/common/common.css');


    // Script Discount page
    mix.scripts([
        '/admin/adminDiscount.js'
    ], 'public/js/admin/adminDiscount.js');
    // End script discount page
    // automatically refreshes web browser after you make changes to your assets

    // mix.browserSync({
    //     proxy: 'project.dev'
    // });
});
