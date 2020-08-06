<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

//import csv
use libraries\Session;

$data=[];
$check='';
if (isset($_GET['file'])){
    $hash = isset($_GET['file']) ? $_GET['file'] : '';
    $csv = $this->get_csv_name($hash);
    $data = $this->get_csv_data($csv);
    $check = $this->check_csv_format($data,$hash);
}




?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <div>
        <h1 class="h2 d-inline">Import CSV</h1>
        <?php if (isset($_GET['step'])): ?>
        <span class="text-primary h6">[<?php
            switch ($_GET['step']){
                case 1: echo 'STEP 1'; break;
                case 2: echo 'STEP 2'; break;
                default:
            }
            ?>]</span>
        <?php endif; ?>
    </div>
</div>

<?php if ($this->action_flag): ?>

<?php if($check == false && $_GET['step']==1): ?>
    <div class="text-center">
        <p class="alert-danger text-center p-3 h4 mt-5">
            Uploaded CSV data is not in the correct format. Please recheck the data.
        </p>
        <a href="javascript:history.back();" class="btn btn-outline-secondary">Back</a>
        <a class="btn btn-outline-danger" href="<?= BASE_URL . 'delete?csv&file=' . $_GET['file'] ?>"><span class="ti-na" title="Delete"></span> Delete CSV</a>
    </div>

<?php endif; ?>

<?php

    switch ($_GET['step']) {
        case 1:
            if($check)
                require 'import-step-1.php';
            break;
        case 2:
            require 'import-step-2.php';
            break;
    }
    //step-1
?>

<?php else: ?>

<?php require PAGE_DIR . 'import-csv-home.php'?>

<?php endif; ?>
