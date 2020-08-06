<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//dashboard
use libraries\Session;
use modules\Users;

//this is the content body for student list page
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <h1 class="h2">Temporary List</h1>
    <div class="">
        <a href="<?= BASE_URL . "import-csv/add-student" ?>" class="btn btn-outline-primary btn-sm">Import Student</a>
        <!--        <a href="--><?//= BASE_URL . "import-csv" ?><!--" class="btn btn-outline-primary btn-sm">Add Multiple Student (Import CSV)</a>-->
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr class="font-weight-bold bg-warning">
            <th width="5%" class="align-middle text-center">S/N ID<br> CertID <br>Mobile</th>
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
        <tbody>

        <?php
        $stuList = $this->temp_list();
        $serial_no=1;
        ?>
        <?php foreach ($stuList as $item): ?>
            <tr class="align-middle">
                <td class="text-center">
                    <?= str_pad($serial_no++, 3, '0', STR_PAD_LEFT) ?> <?= str_pad($item->temp_id, 6, '0', STR_PAD_LEFT); ?> <br>
                    <?= substr($item->tcert_id,2,strlen($item->tcert_id)) ?> <br>
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
                    <?= $item->upazilla ?>, <br>
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
                    <span class="badge badge-danger mb-2">Not Printed</span> <br>
                    <a href="<?= '#info?stud-id=12' ?>" class="btn btn-outline-info btn-sm"><span class="ti-info-alt"></span></a>
                    <a href="<?= BASE_URL . 'delete?temp&stu-id=' . $item->temp_id ?>" class="btn btn-outline-danger btn-sm"><span class="ti-trash"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>