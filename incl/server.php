<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\Tools;
use modules\Import;
error_reporting(0);
$link = new libraries\Database();

if (isset($_GET['uploaded-csv'])){
    $imp = new Import();
    $reslut = $imp->get_unimported_csv();
    $data = [];
    foreach ($reslut as $row) {
        $row['upload'] = Tools::short_date($row['upload']);
        $row = Tools::html($row);
        $data[] = $row;
    }

    echo Tools::get_json($data);
}