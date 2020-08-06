<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

define('APP_NAME', "PBSS Testimonial Service");

define('BASE_URL', "http://".$_SERVER['HTTP_HOST']."/pbss_testimonial/");

define('PROJ_DIR', "pbss_testimonial");

define('D_S', DIRECTORY_SEPARATOR);
define('PAGE_DIR', ROOT . 'pages' . D_S);
define('INCL_DIR', ROOT . 'incl' . D_S);
define('LIB_DIR', ROOT . 'libraries' . D_S);
define('MOD_DIR', ROOT . 'modules' . D_S);
define('UPL_DIR', ROOT . 'uploads' . D_S);

date_default_timezone_set('Asia/Dhaka');

require CONF_DIR . 'db.conf.php';

spl_autoload_register(function ($class_name){
    $class_file = ROOT . $class_name . '.php';
    if (file_exists($class_file))
        require $class_file;
});