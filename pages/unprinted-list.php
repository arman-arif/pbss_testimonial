<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//dashboard
use libraries\Session;
use libraries\Tools;
use modules\Users;

//this is the content body for student list page
$stuList = $this->non_printed_list();
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <div>
        <h1 class="h2 d-inline mr-2">Student List of Non Printed Cert.</h1>
        <span class="text-info">[ <?= $stuList->rowCount(); ?> Students Info. are here ]</span>
    </div>
    <div class="btn-group" role="group">
        <a href="<?= BASE_URL . "student-list/add-student" ?>" class="btn btn-outline-primary btn-sm">Add Student</a>

        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item text-primary" href="<?= BASE_URL . "import-csv" ?>">Import CSV</a>
                <a class="dropdown-item text-primary" href="javascript: void()">Archive All</a>
            </div>

        </div>
        <!--        <a href="--><!--" class="btn btn-outline-primary btn-sm">Add Multiple Student (Import CSV)</a>-->
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr class="font-weight-bold bg-success text-white">
            <th width="5%" class="align-middle text-center">S/N ID <br>CertID <br>Mobile No</th>
            <th class="align-middle">
                Name <br>Father <br>Mother
            </th>
            <th class="align-middle">
                Village <br>Post Office <br>Post Code
            </th>
            <th class="align-middle">
                Upazilla <br>District <br>Date of Birth
            </th>
            <th class="align-middle">
                Exam <br>Board <br> Centre
            </th>
            <th class="align-middle">
                Session <br>Group/Tread <br>Passing Year
            </th>
            <th class="align-middle">
                Reg. No <br>Roll No <br>Result
            </th>
            <th class="align-middle text-center" width="125px">
                Status <br>
                Action
            </th>
        </tr>
        </thead>
        <tbody id="stuList">

        <?php
        $serial_no=1;
        ?>
        <?php foreach ($stuList as $item): ?>
            <tr class="align-middle<?= ($item->result_status == 'Failed') ? " table-danger" : "" ?>">
                <td class="text-center">
                    <?= str_pad($serial_no++, 3, '0', STR_PAD_LEFT) ?>-<?= str_pad($item->sl_id, 6, '0', STR_PAD_LEFT); ?> <br>
                    <?= $item->tcert_id ?> <br>
                    <?= $item->phone_number ?>
                </td>
                <td>
                    <?= $item->stu_name ?> <br>
                    <?= $item->father ?> <br>
                    <?= $item->mother ?>
                </td>
                <td>
                    <?= $item->village ?> <br>
                    <?= $item->post_office ?> <br>
                    <?= $item->post_code ?>
                </td>
                <td>
                    <?= $item->upazilla ?> <br>
                    <?= $item->district ?> <br>
                    <?= $item->date_of_birth?>
                </td>
                <td>
                    <?= $item->exam_name ?> <br>
                    <?= $item->borad_name ?> <br>
                    <?= $item->exam_centre ?>
                </td>
                <td>
                    <?= $item->session ?> <br>
                    <?= $item->group_tread ?> <br>
                    <?= $item->exam_year ?>
                </td>
                <td>
                    <?= $item->reg_no ?> <br>
                    <?= $item->roll_no ?> <br>
                    <?= $item->result . ' (' .ucfirst($item->result_status). ')' ?>
                </td>
                <td class="text-center">
                    <?php $printed = empty($item->last_printed) ?>
                    <span class="badge <?= $printed ? "badge-danger" : "badge-success" ?> mb-2"><?= 'Not Printed' ?></span> <br>
                    <a data-action="info" href="<?= '#info?stud-id=' . $item->sl_id ?>" class="btn btn-outline-info btn-sm" data-id="<?= $item->sl_id ?>"><span class="ti-info-alt"></span></a>
                    <a data-action="print" href="<?= BASE_URL . 'certificate/print?stud-id=' . $item->sl_id ?>" class="btn btn-outline-success btn-sm"><span class="ti-printer"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>