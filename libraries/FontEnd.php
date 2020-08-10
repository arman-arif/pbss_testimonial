<?php
namespace libraries;

class FontEnd {
    //local component, stylesheets location
    private static $reset_css            = 'assets/css/reset.css';
    private static $custom_style         = 'assets/css/style.css';
    private static $wtf_forms_style      = 'assets/css/wtf-forms.css';
    private static $dashboard_style      = 'assets/css/dashboard.css';
    private static $bootstrap_style      = 'assets/css/bootstrap.min.css';
    private static $bstrap_tables_style  = 'assets/vendor/bootstrap-table/bootstrap-table.min.css';
    private static $fontawesome_style    = 'assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css';
    private static $jquery_ui_style      = 'assets/vendor/jquery-ui-1.12.1/jquery-ui.min.css';
    private static $jquery_ui_theme      = 'assets/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css';
    private static $alertify_style       = 'assets/vendor/alertifyjs/css/alertify.css';
    private static $alertify_theme       = 'assets/vendor/alertifyjs/css/themes/default.css';
    private static $themify_icons        = 'assets/vendor/themify-icons/themify-icons.css';

    //local components, javascript location
    private static $custom_script        = 'assets/js/script.js'; //javascript
    private static $dashboard_js         = 'assets/js/dashboard.js'; //javascript
    private static $bootstrap_script     = 'assets/js/bootstrap.min.js'; //javascript
    private static $jquery_script        = 'assets/js/jquery-3.4.1.min.js'; //javascript
    private static $jquery_ui_script     = 'assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js'; //javascript
    private static $popperjs_script      = 'assets/js/popper.min.js'; //javascript
    private static $bstrap_tables_script = 'assets/vendor/bootstrap-table/bootstrap-table.min.js'; //javascript
    private static $bstrap_tables_export = 'assets/vendor/bootstrap-table/extensions/export/bootstrap-table-export.min.js'; //javascript
    private static $feather_icons        = 'assets/vendor/feather.min.js'; //javascript
    private static $alertify_script      = 'assets/vendor/alertifyjs/alertify.min.js'; //javascript
    private static $sweetalert2_js       = 'assets/vendor/sweetalert2.9.js'; //javascript
    private static $table_export         = 'assets/vendor/tableExport.jquery.plugin/tableExport.min.js'; //javascript
    private static $table_export_jspdf   = 'assets/vendor/tableExport.jquery.plugin/libs/jsPDF/jspdf.min.js'; //javascript
    private static $jspdf_autotable      = 'assets/vendor/tableExport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js'; //javascript
    private static $bootboxjs            = 'assets/vendor/bootbox/bootbox.min.js'; //javascript

    //external cdn links
    private static $normalize_style     = 'https://necolas.github.io/normalize.css/8.0.1/normalize.css';
    private static $ionicons     = 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js';

    //defined local components
    public static function reset_css(){
        return self::local_component(self::$reset_css, 'css');
    }

    public static function fontawesome(){
        return self::local_component(self::$fontawesome_style, 'css');
    }

    public static function wtf_forms_style(){
        return self::local_component(self::$wtf_forms_style, 'css');
    }

    public static function dashboard($type){
        if ($type == 'css')
            return self::local_component(self::$dashboard_style, $type);
        else
            return self::local_component(self::$dashboard_js, $type);
    }

    public static function jquery(){
        return self::local_component(self::$jquery_script, 'js');
    }

    public static function bootstrap_datepicker($type){
        if ($type == 'css')
            return self::local_component('assets/vendor/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min.css', 'css');
        else if ($type == 'js')
            return self::local_component('assets/vendor/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js', 'js');
        return '';
    }

    public static function datepicker($type){
        if ($type == 'css')
            return self::local_component('assets/vendor/datepicker-master/dist/datepicker.min.css', 'css');
        else if ($type == 'js')
            return self::local_component('assets/vendor/datepicker-master/dist/datepicker.min.js', 'js');
        return '';
    }

    public static function jquery_ui($type){
        if ($type == 'css')
            return self::local_component(self::$jquery_ui_style, 'css');
        else if ($type == 'js')
            return self::local_component(self::$jquery_ui_script, 'js');
        return '';
    }

    public static function jquery_ui_deftheme($type = 'css') {
        return self::local_component(self::$jquery_ui_theme,'css');
    }

    public static function jquery_validate($additional=false) {
        $myscript = self::local_component('assets/vendor/jquery-validation-1.19.2/dist/jquery.validate.min.js','js');
        if ($additional){
            $myscript .= self::local_component('assets/vendor/jquery-validation-1.19.2/dist/additional-methods.min.js','js');
        }
        return $myscript;
    }

    public static function jquery_ui_basetheme($type = 'css') {
        return self::local_component('assets/vendor/jquery-ui-themes-1.12.1/themes/base/jquery-ui.css','css');
    }

    public static function popperjs(){
        return self::local_component(self::$popperjs_script, 'js');
    }

    public static function bootboxjs(){
        return self::local_component(self::$bootboxjs, 'js');
    }

    public static function sweetalert2(){
        return self::local_component(self::$sweetalert2_js, 'js');
    }

    public static function bootstrap($type){
        if ($type == 'css')
            return self::local_component(self::$bootstrap_style, 'css');
        elseif ($type == 'js')
            return self::local_component(self::$bootstrap_script, 'js');
        return '';
    }


    public static function bootstrap_tables($type){
        if ($type == 'css')
            return self::local_component(self::$bstrap_tables_style, 'css');
        elseif ($type == 'js')
            return self::local_component(self::$bstrap_tables_script, 'js');
        return '';
    }

    public static function table_export_jquery(){
        $loc = self::local_component(self::$table_export, 'js');
        $loc .= self::local_component(self::$table_export_jspdf, 'js');
        $loc .= self::local_component(self::$jspdf_autotable, 'js');
        return $loc;
    }

    public static function bootstrap_table_export(){
        return self::local_component(self::$bstrap_tables_export, 'js');
    }

    public static function feather_icons(){
        return self::local_component(self::$feather_icons,'js');
    }

    public static function themify_icons(){
        return self::local_component(self::$themify_icons,'css');
    }

    public static function custom_style(){
        return self::local_component(self::$custom_style,'css');
    }

    public static function custom_script(){
        return self::local_component(self::$custom_script,'js');
    }

    public static function alertify($type){
        if ($type == 'css')
            return self::local_component(self::$alertify_style, 'css');
        elseif ($type == 'js')
            return self::local_component(self::$alertify_script, 'js');
        elseif ($type == 'theme')
            return self::local_component(self::$alertify_theme, 'css');
        return '';
    }

    //external components
    public static function normalize_css(){
        return self::external_component(self::$normalize_style, 'css');
    }
    public static function ionicons(){
        return self::external_component(self::$ionicons, 'js');
    }



    //function to define stylesheets and scripts
    public static function local_component($file_loc, $type){
        if ($type == 'css')
            return '<link rel="stylesheet" href="'. BASE_URL . $file_loc .'"/>' . PHP_EOL;
        else if ($type == 'js')
            return '<script src="'. BASE_URL . $file_loc .'"></script>' . PHP_EOL;
        return '';
    }
    public static function external_component($cdn_loc, $type){
        if ($type == 'css')
            return "<link rel='stylesheet' href='${cdn_loc}'/>" . PHP_EOL;
        else if ($type == 'js')
            return '<script src="' . $cdn_loc . '"></script>' . PHP_EOL;
        return '';
    }

} //end of class

