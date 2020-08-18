<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//dashboard
use libraries\FontEnd;
use libraries\Session;
use libraries\Tools;
use modules\Certificate;
use modules\Login;

global $uri;
Login::check_login($uri);

$cert = new Certificate();
$infos = null;

if (isset($_GET['all'])){
    if ($_GET['all']=='unprinted'){
        $infos = $cert->get_unprinted_testimo();
    }
}
if (isset($_GET['type']))
    if ($_GET['type']=='single'){
        $infos = $cert->get_single_testimo();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Certificate</title>
    <link rel="stylesheet" href="<?= BASE_URL . FontEnd::$certific_print ?>" media="print">
    <link rel="stylesheet" href="<?= BASE_URL . FontEnd::$certific_css ?>" media="screen">
    <link rel="stylesheet" href="<?= BASE_URL . FontEnd::$themify_icons ?>" media="screen">

</head>
<body>


<div class="print">

<?php if($infos): ?>
    <?php foreach ($infos as $info): ?>
    <div class="wrapper">
        <div class="bg-image">
            <img src="<?= BASE_URL . 'resources/' ?>logo_m.png" alt="">
        </div>
        <div class="header">
            <h1>Pather Bazar Secondary School</h1>
            <h3>Post Office: Hazigram, Upazilla: Dighalia, District: Khulna, GPO-9222</h3>
            <h3>Established: 1986, School Code: 3931, EIIN No: 117072</h3>

        </div>
        <p class="serial-no"><b>Serial No:</b> <?= $info->tcert_id ?></p>
        <p class="telephone-no"><b>Telephone:</b> 041-890343</p>
        <h2 class="title">Testimonial</h2>
        <div class="cert-body">
            <p class="parag">
                This is to say that <strong class="name"><?= $info->stu_name ?></strong>,
                Father <strong class="fname"><?= $info->father ?></strong>,
                Mother <strong class="mname"><?= $info->mother ?></strong>,
                Village: <strong class="village"><?= $info->village ?></strong>,
                Post Office: <strong class="po"><?= $info->post_office ?></strong>,
                Upazilla: <strong class="upazilla"><?= $info->upazilla ?></strong>,
                District <strong class="district"><?= $info->district ?></strong>, was the student of this school.
                <?= $info->gender == 'Male' ? 'He' : 'She' ?> passed the <strong class="exam"><?= $info->exam_name ?></strong> Examination held under the
                <strong class="board">Board of Intermediate and Secondary Education, <?= $info->board_name ?></strong> in
                <strong class="year"><?= $info->exam_year ?></strong>.
                <?= $info->gender == 'Male' ? 'He' : 'She' ?> was the student of
                <strong class="group-tread"><?= $info->group_tread ?></strong> group and obtained
                <strong>GPA <span class="gpa"><?= str_pad($info->result,4,'0',STR_PAD_RIGHT) ?></span></strong>.
                <?= $info->gender == 'Male' ? 'His' : 'Her' ?> roll
                <span class="centre"><?= ucfirst(strtolower($info->exam_centre)) ?></span> No
                <strong class="roll"><?= $info->roll_no ?></strong> and
                Registration No <strong class="reg"><?= $info->reg_no ?></strong>, Session <strong><?= $info->session ?></strong>.
                <?= $info->gender == 'Male' ? 'His' : 'Her' ?> date of birth <strong class="dob"><?= Tools::format_date($info->date_of_birth) ?></strong>.
                In words <strong class="dobiw"><?= Tools::date_in_words($info->date_of_birth) ?></strong>.
                <?= $info->gender == 'Male' ? 'He' : 'She' ?> was not engaged in any anti-social and anti-state activities at the time of studying in this
                institution.
                <?= $info->gender == 'Male' ? 'He' : 'She' ?> possesses a moral character.<br>
                <span>I wish  <?= $info->gender == 'Male' ? 'him' : 'her' ?> success.</span>
            </p>
        </div>
        <span class="signature">Head Master</span>

    </div>
    <?php endforeach; ?>
<?php endif; ?>

</div>

<div class="buttons">
    <div><a id="downloadPdf" href="<?= '#download' ?>" title="Download PDF"><span class="ti-download"></span></a></div>
    <div><a id="printHtml" href="<?= '#print' ?>" title="Print HTML"><span class="ti-printer"></span></a></div>
    <div><a id="generatePdf" href="<?= '#pdf' ?>" title="Generate PDF"><span class="ti-file"></span></a></div>
</div>

<?= FontEnd::jquery() ?>
<script>
    $(document).ready(function () {
        $('#printHtml').click(function (e) {
            print();
        });
    });
</script>

</body>
</html>
