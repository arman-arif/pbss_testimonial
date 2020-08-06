<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "pbss_info";

$dsn = "mysql:host=$host;dbname=$dbname";

define('HST', $host);
define('DBN', $dbname);
define('DSN', $dsn);
define('USR', $user);
define('PWD', $pass);