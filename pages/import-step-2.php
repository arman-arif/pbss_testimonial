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


$stuList = $st->temp_list();
$serial_no = 1;


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
            foreach ($stuList as $item):
                ?><tr<?= ($item->result_status == "Failed")?' class="table-danger"':'' ?>><td><?= $serial_no++ ?></td><td><?=
                    $item->stu_name ?></td><td><?=
                    $item->father ?></td><td><?=
                    $item->mother ?></td><td><?=
                    $item->gender ?></td><td><?=
                    $item->village ?></td><td><?=
                    $item->post_office ?></td><td><?=
                    $item->post_code ?></td><td><?=
                    $item->upazilla ?></td><td><?=
                    $item->district ?></td><td><?=
                    $item->exam_name ?></td><td><?=
                    $item->borad_name ?></td><td><?=
                    $item->exam_year ?></td><td><?=
                    $item->group_tread ?></td><td><?=
                    $item->result_status ?></td><td><?=
                    $item->result ?></td><td><?=
                    $item->roll_no ?></td><td><?=
                    $item->exam_centre ?></td><td><?=
                    $item->reg_no ?></td><td><?=
                    $item->session ?></td><td><?=
                    $item->date_of_birth ?></td><td><?=
                    $item->phone_number ?></td></tr><?php
            endforeach;
            ?></tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mt-3 border-top">
    <span></span>
    <span>
        Move student information from temporary database to permanent
        <a id="btnFinalStep" href="<?= BASE_URL . "import-csv?step=2&file=" . $_GET['file'] ?>" class="btn btn-sm btn-primary">Move to Student Database &gt;   </a>
    </span>
</div>