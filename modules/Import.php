<?php
namespace modules;

use libraries\Controller;
use libraries\Database;
use libraries\FontEnd;
use libraries\Session;
use libraries\Tools;
use libraries\Upload;

class Import implements Controller
{
    private $database = null;
    private $table = 'imported_csv_files';
    protected $page_title = null;
    public $message = false;
    private $uri = false;
    private $action_flag = false;


    public function __construct() {
        $this->database = new Database();
        $this->page_title = "Import";
        $this->uri = $GLOBALS['uri'];
        $this->custom_title();


        if (Session::has('message')){
            $this->message = Session::get('message');
            Session::remove('message');
        } elseif (Session::has('err_msg')){
            $this->message = Session::get('err_msg');
            Session::remove('err_msg');
        }

        if (isset($_FILES['upload_csv'])){
            $this->upload();
            Tools::redirect('uploaded-csv');
        }

        if (isset($_GET['file'])){
            $this->action_flag = true;
        }
        if (isset($_GET['step'])){
            $this->action_flag = true;
        }

    }

    private function custom_title(){
        if (isset($this->uri[0])){
            switch ($this->uri[0]){
                case 'import-csv':
                    $this->page_title = "Import CSV";
                    if (isset($_GET['step']))
                        $this->page_title = "Step-$_GET[step]: Import CSV";
                    break;
                case 'upload-csv':
                    $this->page_title = "Upload CSV";
                    break;
                case 'uploaded-csv':
                    $this->page_title = "Uploaded CSV List";
                    break;
                case 'imported-csv':
                    $this->page_title = "Imported CSV List";
                    break;
            }
        }
    }

    private function upload(){
        $upload = new Upload();
        $csv_file = $upload->uploadCSV("upload_csv");
        if ($csv_file) {
            $unique_hash = substr(md5(time()) . md5(rand(0,999999999)),0,17);
            $query = "INSERT INTO $this->table (file_name,uploaded,`hash`) VALUES  ('$csv_file', now(), '$unique_hash')";
            if ($this->database->insert($query)){
                Session::set('message', "File uploaded successfully");
            }
            $data_info = base64_encode($this->check_csv_info($csv_file));
            $update_query = "UPDATE $this->table SET data_info = '${data_info}' WHERE hash = '${unique_hash}'";
            $this->database->update($update_query);

//                Tools::redirect("import-csv");
//                Tools::redirect("uploaded-csv");
        } else {
            Tools::redirect("upload-csv");
        }
    }

    public function check_csv_info($csv_file){
        $csv_source = UPL_DIR . 'CSV' . D_S . $csv_file;
        $csv = fopen($csv_source,"r");

        $data = array();
        while ($row = fgetcsv($csv)){
            $data[] = $row;
        }
        fclose($csv);

        $num_rows = count($data);

        $data_info = array(
          'total_num_rows'  => $num_rows,
          'acceptable_rows' => $num_rows-1
        );
//        print_r($data);
        return json_encode($data_info);
    }

    public function get_uploaded_csv(){
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        return $this->database->select($query);
    }

    public function get_unimported_csv(){
        $query = "SELECT * FROM $this->table WHERE imported IS NULL AND `status` IS NULL ORDER BY id DESC";
        $result = $this->database->select($query);
        $data = array();
        foreach ($result as $row) {
            $data[] = [
                'name'   => $row['file_name'],
                'upload' => $row['uploaded'],
                'file'   => $row['hash']
            ];
        }
        return $data;
    }

    public function get_csv_name($hash) {
        $query = "SELECT file_name FROM imported_csv_files WHERE hash = '$hash'";
        $result = $this->database->select($query);
        if ($result)
            return $result->fetch_object()->file_name;
        return 0;
    }

    public function check_csv_format($data,$hash){
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
        $flag = true;

        for ($i=0;$i<count($dataHeader);$i++){
            if ($dataHeader[$i] !== $data[0][$i]){
                $flag = false;
            }
        }

        if (!$flag){
            $query="UPDATE imported_csv_files SET status='invalid' WHERE hash = '${hash}'";
            if ($this->database->update($query))
                return false;
        }

        return true;

    }

    public function insert_student_to_tmp($dataArray){
        $pdo = $this->database->getPdo();
        $sql = 'INSERT INTO temp_list_for_testimonial
                SET tcert_id        = :tc_id,
                    stu_name        = :name, 
                    father          = :father,
                    mother          = :mother,
                    gender          = :gender,
                    village         = :village,
                    post_office     = :post_office,
                    post_code       = :post_code,
                    upazilla        = :upazilla,
                    district        = :district,
                    exam_name       = :exam,
                    board_name      = :borad,
                    exam_year       = :exam_year, 
                    group_tread     = :group_tread,
                    result          = :result,
                    result_status   = :status,
                    roll_no         = :roll_no,
                    exam_centre     = :centre,
                    reg_no          = :reg_no,
                    date_of_birth   = :dob,
                    session         = :session,
                    phone_number    = :phone';
        $stmt = $pdo->prepare($sql);

        $t_id =strtoupper(substr($dataArray[9],0,1)).'-';
        $t_id.=substr($dataArray[18],strlen($dataArray[18])-2,2);
        $t_id.=substr($dataArray[11],2,2);
        $t_id.=$dataArray[15];

        $stmt->bindParam('tc_id',$t_id);
        $stmt->bindParam('name',$dataArray[0]);
        $stmt->bindParam('father',$dataArray[1]);
        $stmt->bindParam('mother',$dataArray[2]);
        $stmt->bindParam('gender',$dataArray[3]);
        $stmt->bindParam('village',$dataArray[4]);
        $stmt->bindParam('post_office',$dataArray[5]);
        $stmt->bindParam('post_code',$dataArray[6]);
        $stmt->bindParam('upazilla',$dataArray[7]);
        $stmt->bindParam('district',$dataArray[8]);
        $stmt->bindParam('exam',$dataArray[9]);
        $stmt->bindParam('borad',$dataArray[10]);
        $stmt->bindParam('exam_year',$dataArray[11]);
        $stmt->bindParam('group_tread',$dataArray[12]);
        $stmt->bindParam('result',$dataArray[14]);
        $stmt->bindParam('status',$dataArray[13]);
        $stmt->bindParam('roll_no',$dataArray[15]);
        $stmt->bindParam('centre',$dataArray[16]);
        $stmt->bindParam('reg_no',$dataArray[17]);
        $stmt->bindParam('dob',$dataArray[19]);
        $stmt->bindParam('session',$dataArray[18]);
        $stmt->bindParam('phone',$dataArray[20]);

        $result = $stmt->execute();
        if ($result)
            return 1;
        return 0;

    }

    public function import_tmp_data($csvData, $hash){
        $errList = [];

        for ($i=1;$i<count($csvData);$i++){
            $result = $this->insert_student_to_tmp($csvData[$i]);
            if (!$result)
                array_push($errList, $i);
        }

        $query="UPDATE imported_csv_files SET imported = NOW(), status='imported' WHERE hash = '${hash}'";

        if ($this->database->update($query))
            return $errList;
        return false;
    }

    public function move_temp_to_database(){
        $query = "INSERT INTO student_info_for_testimonial (tcert_id,stu_name,father,mother,gender,village,post_office,post_code,upazilla,district,exam_name,board_name,exam_year,group_tread,result_status,result,roll_no,exam_centre,reg_no,`session`,date_of_birth,phone_number) 
            SELECT tcert_id,stu_name,father,mother,gender,village,post_office,post_code,upazilla,district,exam_name,board_name,exam_year,group_tread,result_status,result,roll_no,exam_centre,reg_no,`session`,date_of_birth,phone_number
            FROM temp_list_for_testimonial";

        if ($this->database->delete($query))
            return true;
        return 0;
    }

    public function update_invalid_csv($hash){
        $query="UPDATE imported_csv_files SET status='invalid' WHERE hash = '${hash}'";
        if ($this->database->update($query))
            return true;
        return false;
    }

    public function decorate_csv_data($data){
        return [
            'student_name'  => $data[0],
            'father_name'   => $data[1],
            'mother_name'   => $data[2],
            'gender'        => $data[3],
            'village'       => $data[4],
            'postoffice'    => $data[5],
            'postcode'      => $data[6],
            'upazilla'      => $data[7],
            'district'      => $data[8],
            'exam'          => $data[9],
            'borad'         => $data[10],
            'year'          => $data[11],
            'group'         => $data[12],
            'status'        => $data[13],
            'result'        => $data[14],
            'roll_no'       => $data[15],
            'centre'        => $data[16],
            'reg_no'        => $data[17],
            'session'       => $data[18],
            'dateofbirth'   => $data[19],
            'phone'         => $data[20]
        ];
    }

    public function get_csv_data($csv_file){
        $csv_source = UPL_DIR . 'CSV' . D_S . $csv_file;
        $csv = fopen($csv_source,"r");

        $data = array();
        while ($row = fgetcsv($csv)){
            $data[] = $row;
        }
        fclose($csv);

        return $data;
    }

    public function get_view(){
        if ($this->uri[0] == 'import-csv'){
            include PAGE_DIR . 'import-csv.php';
        } elseif ($this->uri[0] == 'imported-csv'){
            include PAGE_DIR . 'imported-list.php';
        } elseif ($this->uri[0] == 'upload-csv'){
            include PAGE_DIR . 'upload-csv.php';
        } elseif ($this->uri[0] == 'uploaded-csv'){
            include PAGE_DIR . 'uploaded-csv-list.php';
        }
    }

    public function get_title(){
        return $this->page_title;
    }



    public function get_script(){
        $script = FontEnd::local_component("assets/modules/import.ajax.js","js");
        $script .= FontEnd::sweetalert2();
        $script .= FontEnd::alertify('js');
        return $script;
    }

    public function get_style(){
        $stylesheets = FontEnd::themify_icons();
        $stylesheets .= FontEnd::wtf_forms_style();
        $stylesheets .= FontEnd::alertify('css');
        $stylesheets .= FontEnd::alertify('theme');
        return $stylesheets;
    }
}