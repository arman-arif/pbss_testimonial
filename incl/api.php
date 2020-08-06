<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\Tools;
use modules\Import;
use modules\Students;

//error_reporting(0);
$link = new libraries\Database();
$pdo = $link->getPdo();

if (isset($_GET['imp-csv-to-tmp'])){

    $file=isset($_GET['file'])?$_GET['file']:'';
    $imp = new Import();

    $csv = $imp->get_csv_name($file);
    $csvData = $imp->get_csv_data($csv);
    $imp->import_tmp_data($csvData,$file);

//    foreach ($csvData as $i => $info){
//        print_r($dataArray);
////        var_dump($dataArray);
//        $insert = $stu->add_student($dataArray);
//        if ($insert != 'Record insert successfully'){
//
//        }
//    }
    echo "Data import complete successfully";

}



?>


<?php
//$file_source = ROOT."resources/username.csv";
//$file = fopen($file_source,"r");
//
//$data = array();
//while ($row = fgetcsv($file, "", ";")){
//    $data[] = $row;
//}
//
//print_r($data);
//
//fclose($file);

?>

