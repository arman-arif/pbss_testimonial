<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\Tools;
use modules\Import;
use modules\Students;

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

if (isset($_GET['student-info'])){
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id){
        $st = new Students();
        $result = $st->get_stu_info($id);
        if ($result->rowCount() == 1){
            $row = $result->fetch();
            $data = [
                'id'        => $row->sl_id,
                'certId'    => $row->tcert_id,
                'name'      => $row->stu_name,
                'father'    => $row->father,
                'mother'    => $row->mother,
                'gender'    => $row->gender,
                'village'   => $row->village,
                'poffice'   => $row->post_office,
                'pcode'     => $row->post_code,
                'upazilla'  => $row->upazilla,
                'district'  => $row->district,
                'exam'      => $row->exam_name,
                'borad'     => $row->borad_name,
                'year'      => $row->exam_year,
                'session'   => $row->session,
                'centre'    => $row->exam_centre,
                'group'     => $row->group_tread,
                'roll'      => $row->roll_no,
                'reg_no'    => $row->reg_no,
                'rstatus'   => $row->result_status,
                'result'    => str_pad($row->result,4,0,STR_PAD_RIGHT),
                'phone'     => $row->phone_number,
                'dob'     => $row->date_of_birth . " [ ". Tools::date_in_words($row->date_of_birth) ." ]",
                'last_printed'  => $row->last_printed
            ];
            echo json_encode($data);
        } else {
            echo "Something went wrong";
        }
    } else {
        echo "Something went wrong";
    }

//    var_dump($row);

}

if (isset($_GET['temp-info'])){
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id){
        $st = new Students();
        $result = $st->get_tmp_info($id);
        if ($result->rowCount() == 1){
            $row = $result->fetch();
            $data = [
                'id'        => $row->temp_id,
                'certId'    => $row->tcert_id,
                'name'      => $row->stu_name,
                'father'    => $row->father,
                'mother'    => $row->mother,
                'gender'    => $row->gender,
                'village'   => $row->village,
                'poffice'   => $row->post_office,
                'pcode'     => $row->post_code,
                'upazilla'  => $row->upazilla,
                'district'  => $row->district,
                'exam'      => $row->exam_name,
                'borad'     => $row->borad_name,
                'year'      => $row->exam_year,
                'session'   => $row->session,
                'centre'    => $row->exam_centre,
                'group'     => $row->group_tread,
                'roll'      => $row->roll_no,
                'reg_no'    => $row->reg_no,
                'rstatus'   => $row->result_status,
                'result'    => str_pad($row->result,4,0,STR_PAD_RIGHT),
                'phone'     => $row->phone_number,
                'dob'     => $row->date_of_birth . " [ ". Tools::date_in_words($row->date_of_birth) ." ]",
                'last_printed'  => $row->last_printed
            ];
            echo json_encode($data);
        } else {
            echo "Something went wrong";
        }
    } else {
        echo "Something went wrong";
    }

//    var_dump($row);

}