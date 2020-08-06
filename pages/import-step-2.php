<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

//import csv step-1
use libraries\Session;

$st = new \modules\Students();

$dataHeader = array(
    'Student Name',
    'Father Name',
    'Mother Name',
    'Gender',
    'Village',
    'Post Office',
    'Post Code',
    'Upazilla',
    'District',
    'Exam Name',
    'Board Name',
    'Passing Year',
    'Group/Tread',
    'Result Status',
    'Result',
    'Roll No',
    'Exam Center',
    'Registration No',
    'Session',
    'DoB (yyyy-mm-dd)',
    'Phone Number'
);



?>

<h5 class="text-center mb-3 text-uppercase">Check student info before moving to database</h5>

<div class="w-100 overflow-auto border">
    <div class="table-responsive" style="max-height: calc(100vh - 300px); width: max-content" id="importCsvDataTbl">
        <table class="table table-sm table-striped table-bordered">
            <thead class="bg-white border text-center">
            <tr class="font-weight-bold">
                <th>S/N</th>
                <?php foreach ($dataHeader as $datum):
                    ?><th><?= $datum ?></th><?php
                endforeach;
                ?></tr>
            </thead>
            <tbody><?php
            for ($i=1;$i<count($data);$i++):
                ?><tr><?php
                foreach ($data[$i] as $datum):
                    ?><th><?= $datum ?></th><?php
                endforeach;
                ?></tr><?php
            endfor;
            ?></tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mt-3 border-top">
    <span></span>
    <span>
        Move student information from temporary database to permanent
        <a id="btnNextStep2" href="<?= BASE_URL . "import-csv?step=2&file=" . $_GET['file'] ?>" class="btn btn-sm btn-primary">Move to Database &gt;   </a>
    </span>
</div>