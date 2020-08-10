<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\Tools;
use modules\Delete;
use modules\Import;
use modules\Login;
use modules\Students;

global $uri;
Login::check_login($uri);
//error_reporting(0);
$link = new libraries\Database();
$pdo = $link->getPdo();

if (isset($_GET['imp-csv-to-tmp'])){

    $file=isset($_GET['file'])?$_GET['file']:'';
    $imp = new Import();

    $csv = $imp->get_csv_name($file);
    $csvData = $imp->get_csv_data($csv);
    $imp->import_tmp_data($csvData,$file);

    echo "Data import complete successfully";

}

if (isset($_GET['tmp-to-list'])){

    $file=isset($_GET['file'])?$_GET['file']:'';
    $imp = new Import();

    if ($imp->move_temp_to_database()) {
        $link->delete("DELETE FROM temp_list_for_testimonial");
        echo "Moving complete successfully";
    } else {
        echo "Could not move! Something is wrong..";
    }


}

if (isset($_GET['invalid-csv'])) {
    $file = isset($_GET['file']) ? $_GET['file'] : '';
    $imp = new Import();
    if ($imp->update_invalid_csv($file)){
        echo "Updated successfully";
    }
}


if (isset($_GET['delete'])){
    $stu = isset($_GET['student']) ? $_GET['student'] : '';
    switch ($stu){
        case 'all':
            if (Delete::del_all_students())
                echo json_encode(['status'=>'success','message'=>"All records are deleted"]);
            else
                echo json_encode(['status'=>'error','message'=>"Deleting failed!"]);
            break;
        case 'tmp':
            if (Delete::empty_temp_list())
                echo json_encode(['status'=>'success','message'=>"All records are deleted"]);
            else
                echo json_encode(['status'=>'error','message'=>"Deleting failed!"]);
            break;
        default:
            echo "Something went wrong";
            break;
    }
}

