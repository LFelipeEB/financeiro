var path = require('path');
var elixir = require('laravel-elixir');

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

// Gentelella vendors path : vendor/bower_components/gentelella/vendors

elixir(function(mix) {
    
    /********************/
    /* Copy Stylesheets */
    /********************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

    // Gentelella
    mix.copy('vendor/bower_components/gentelella/build/css/custom.min.css', 'public/css/gentelella.min.css');

    //Select2
    mix.copy('vendor/bower_components/select2/dist/css/select2.min.css', 'public/css/select2.min.css');

    //DataTable
    mix.copy('vendor/bower_components/datatables.net-dt/css/jquery.dataTables.min.css', 'public/css/dataTable.min.css');

    //DateRangePicker
    mix.copy('vendor/bower_components/bootstrap-daterangepicker/daterangepicker.css', 'public/css/daterange.css');

    /****************/
    /* Copy Scripts */
    /****************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');

    // jQuery
    mix.copy('vendor/bower_components/gentelella/vendors/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');

    // jQuery
    mix.copy('vendor/bower_components/popper.js/dist/poper.min.js', 'public/js/jquery.min.js');

    // Gentelella
    mix.copy('vendor/bower_components/gentelella/build/js/custom.min.js', 'public/js/popper.min.js');

    //Select2
    mix.copy('vendor/bower_components/select2/dist/js/select2.min.js', 'public/js/select2.min.js');

    //DataTable
    mix.copy('vendor/bower_components/datatables.net/js/jquery.dataTables.min.js', 'public/js/dataTable.min.js');

    //Chart.JS
    mix.copy('vendor/bower_components/chart.js/dist/Chart.bundle.min.js', 'public/js/chart.bundle.min.js');
    mix.copy('vendor/bower_components/chart.js/dist/Chart.min.js', 'public/js/chart.min.js');

    //DataTable
    mix.copy('vendor/bower_components/sweetalert2/dist/sweetalert2.all.js', 'public/js/sweetalert2.all.js');

    //DateRangePicker
    mix.copy('vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js', 'public/js/daterange.js');
    mix.copy('vendor/bower_components/moment/min/moment.min.js', 'public/js/moment.js');

    /**************/
    /* Copy Fonts */
    /**************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/fonts/', 'public/fonts');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/fonts/', 'public/fonts');
});
