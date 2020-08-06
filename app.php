<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

use libraries\Router;
use libraries\Session;
use libraries\Tools;

$uri = null;

require CONF_DIR . 'config.php';

Session::start();
//Tools::check_user_active();

$Route = new Router();

require INCL_DIR . 'route.php';

$Route->deploy();
