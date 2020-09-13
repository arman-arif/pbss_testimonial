<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//print
include LIB_DIR . 'dompdf/autoload.inc.php';

use libraries\FontEnd;
use libraries\Session;
use libraries\Tools;
use modules\Certificate;
use modules\Login;
use Dompdf\Dompdf;
use Dompdf\Options;

global $uri;
//Login::check_login($uri);

$cert = new Certificate();
$infos = null;
$counter = 0;
$uriOptions = '';

if (isset($_GET['all'])){
    if ($_GET['all']=='unprinted'){
        $infos = $cert->get_unprinted_testimo();
        $uriOptions='all=unprinted';
    }
}
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'single') {
        $infos = $cert->get_single_testimo();
        $uriOptions = "exam=$_GET[exam]&year=$_GET[year]&board=$_GET[board]&roll=$_GET[roll]&reg=$_GET[reg]&type=single";
    }
}

//echo $_SERVER['QUERY_STRING'];

if (isset($_GET['get'])){
    if ($_GET['get']=='pdf'){

        $uri_options='';
        if ($_GET['all']){
            if ($_GET['all']=='unprinted'){
                $uri_options="all=unprinted";
            } else {
                $uri_options="all=entire";
            }
        } elseif ($_GET['type']=='single'){
            $uri_options="exam=$_GET[exam]&year=$_GET[year]&board=$_GET[board]&roll=$_GET[roll]&reg=$_GET[reg]&type=single";
        }

        $manual_options = 'exam=SSC&year=2020&board=Jashore&roll=115443&reg=1713110090&type=single';
        //cURL
        $base_url=BASE_URL.'print?view=pdf&';
        $curl = curl_init();
        $target_url = $base_url.$uri_options;
        curl_setopt($curl,CURLOPT_URL,$target_url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $html = curl_exec($curl);

        //end cURL


        $options = new Options();
//        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','landscape'); //Setup the paper size and orientation
        $dompdf->render(); // Render the HTML as PDF
//        $dompdf->stream('cert');
        $dompdf->stream('cert',['Attachment'=>0]);// Output the generated PDF to Browser

//        try {
//            $pdf->loadHtmlFile($htmlFile);
//        } catch (\Dompdf\Exception $e) {
//            echo $e;
//        }


//        $pdf->loadHtml('hello world');
    }
}
$space = ' ';
?>
<?php if(!isset($_GET['get'])): ?>
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
<?php if($infos):
        foreach ($infos as $info):
    ?><div class="wrapper">
        <div class="bg-image">
            <img src="<?= BASE_URL . 'resources/logo_m.png' ?>" alt="Logo">
        </div>
        <div class="header">
            <h1>Pather Bazar Secondary School</h1>
            <h3>Post Office: Hazigram, Upazilla: Dighalia, District: Khulna, GPO-9222</h3>
            <h3>Established: 1986, School Code: 3931, EIIN No: 117072</h3>

        </div>
        <div class="sub-header">
            <p class="serial-no"><b>Serial No:</b> <?= str_pad($info->sl_id, 6, '0',STR_PAD_LEFT) ?></p>
            <p class="telephone-no"><b>Telephone:</b> 041-890343</p>
            <div class="clearfix"></div>
        </div>
        <h2 class="title">Testimonial</h2>
        <div class="cert-body">
            <p class="parag">
                This is to say that <strong class="name"><?= $info->stu_name ?></strong>,<?= $space
                ?>Father <strong class="fname"><?= $info->father ?></strong>,<?= $space
                ?>Mother <strong class="mname"><?= $info->mother ?></strong>,<?= $space
                ?>Village: <strong class="village"><?= $info->village ?></strong>,<?= $space
                ?>Post Office: <strong class="po"><?= $info->post_office ?></strong>,<?= $space
                ?>Upazilla: <strong class="upazilla"><?= $info->upazilla ?></strong>,<?= $space
                ?>District <strong class="district"><?= $info->district ?></strong>, was the student of this school.<?= $space
                ?><?= $info->gender == 'Male' ? 'He' : 'She' ?> passed the <strong class="exam"><?= $info->exam_name ?></strong> Examination held under the <?= $space
                ?><strong class="board">Board of Intermediate and Secondary Education, <?= $info->board_name ?></strong> in <?= $space
                ?><strong class="year"><?= $info->exam_year ?></strong>. <?= $space
                ?><?= $info->gender == 'Male' ? 'He' : 'She' ?> was the student of <?= $space
                ?><strong class="group-tread"><?= $info->group_tread ?></strong> group and obtained <?= $space
                ?><strong>GPA <span class="gpa"><?= str_pad($info->result,4,'0',STR_PAD_RIGHT) ?></span></strong>. <?= $space
                ?><?= $info->gender == 'Male' ? 'His' : 'Her' ?> roll <?= $space
                ?><span class="centre"><?= ucfirst(strtolower($info->exam_centre)) ?></span> No <?= $space
                ?><strong class="roll"><?= $info->roll_no ?></strong> and <?= $space
                ?>Registration No <strong class="reg"><?= $info->reg_no ?></strong>, Session <strong><?= $info->session ?></strong>. <?= $space
                ?><?= $info->gender == 'Male' ? 'His' : 'Her' ?> date of birth <strong class="dob"><?= Tools::format_date($info->date_of_birth) ?></strong>. <?= $space
                ?>In words <strong class="dobiw"><?= Tools::date_in_words($info->date_of_birth) ?></strong>. <?= $space
                ?><?= $info->gender == 'Male' ? 'He' : 'She' ?> was not engaged in any anti-social and anti-state activities at the time of studying in this institution. <?= $space
                ?><?= $info->gender == 'Male' ? 'He' : 'She' ?> possesses a moral character.<br><?= $space
                ?><span>I wish  <?= $info->gender == 'Male' ? 'him' : 'her' ?> success.</span>
            </p>
        </div>
        <span class="signature">Head Master</span>

    </div><div class="page-break"></div>
    <?php $counter++ ?>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<?php if(!isset($_GET['get']) && !isset($_GET['view'])): ?>
    <div class="buttons">
        <div><a id="downloadPdf" href="<?= '#download' ?>" title="Download PDF"><span class="ti-download"></span></a></div>
        <div><a id="printHtml" href="<?= '#print' ?>" title="Print HTML"><span class="ti-printer"></span></a></div>
        <div><a id="generatePdf" href="<?= BASE_URL . 'print?get=pdf&' . $uriOptions ?>" target="_blank" title="Generate PDF"><span class="ti-file"></span></a></div>
    </div>

    <div class="infos">
        <a class="disabled" href="#" title="<?= 'Total ' . $counter . ' pages' ?>" disabled="" onclick="return false;" style="cursor: default">
            <span><?= str_pad($counter, 3, '0',STR_PAD_LEFT) ?></span></a>
        <a id="printInfo" href="#" title="Info" style="cursor: help"><span class="ti-info"></span></a>
    </div>
<?php endif; ?>

<?= FontEnd::jquery() ?>
<script>
    $(document).ready(function () {
        $('#printHtml').click(function (e) {
            e.preventDefault();
            print();
        });
    });
</script>

</body>
</html>
<?php endif; ?>
