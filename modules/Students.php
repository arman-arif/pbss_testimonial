<?php
namespace modules;

use libraries\Controller;
use libraries\Database;
use libraries\FontEnd;
use libraries\Session;
use libraries\Tools;

class Students implements Controller {
    private $database = null;
    private $table = 'students';
    protected $page_title = null;
    public $message = false;
    private $uri = false;


    public function __construct() {
        $this->database = new Database();
        $this->page_title = "Student";
        $this->uri = $GLOBALS['uri'];

        if (!isset($this->uri[1]) && $this->uri[0] == 'student-list'){
            $this->page_title = "Student List";
//        } elseif (!isset($this->uri[1]) && $this->uri[0] == 'add-student'){
        } elseif (isset($this->uri[1])){
            switch ($this->uri[1]){
                case 'add-student':
                    $this->page_title = "Add Student to List";
                    break;
                case 'printed':
                    $this->page_title = "Printed Certificate List";
                    break;
                case 'unprinted':
                    $this->page_title = "Unprinted Certificate List";
                    break;
                case 'temporary':
                    $this->page_title = "Temporary Student List";
                    break;
                default:
                    $this->page_title = "Student List";
                    break;
            }
        }

        if (isset($_POST['addStudentInfo'])){
            $data_array = Tools::validate_data_array($_POST);
            $message = $this->add_student($data_array);
            Session::set("message", $message);
            Tools::redirect(BASE_URL.'student-list');
        }

    }

    public function get_view(){
        if (!isset($this->uri[1]) && $this->uri[0] == 'student-list'){
            include PAGE_DIR . 'student-list.php';
//        } elseif (!isset($this->uri[1]) && $this->uri[0] == 'add-student'){
        } elseif (isset($this->uri[1]) && $this->uri[1] == 'add-student'){
            include PAGE_DIR . 'add-student.php';
        } elseif (isset($this->uri[1]) && $this->uri[1] == 'printed'){
            include PAGE_DIR . 'printed-list.php';
        } elseif (isset($this->uri[1]) && $this->uri[1] == 'unprinted'){
            include PAGE_DIR . 'unprinted-list.php';
        } elseif (isset($this->uri[1]) && $this->uri[1] == 'temporary'){
            include PAGE_DIR . 'temporary-list.php';
        } else {
            include INCL_DIR . 'error-page.php';
        }
    }

    public function get_title(){
        return $this->page_title;
    }

    public function get_script(){
        $script = FontEnd::jquery_ui('js');
        $script .= FontEnd::local_component('assets/modules/students.jquery.js', 'js');
        $script .= FontEnd::alertify('js');
        if (isset($this->uri[1])){
            switch ($this->uri[1]){
                case 'add-student':
                    $script .= FontEnd::jquery_validate(true);
                    $script .= FontEnd::datepicker('js');
                    $script .= FontEnd::local_component('assets/modules/addstudent.ui.ajax.js', 'js');
                    break;
                default:
                    break;
            }
        }

        return $script;
    }

    public function get_style(){
        $stylesheets = FontEnd::themify_icons();
        $stylesheets .= FontEnd::alertify('css');
        $stylesheets .= FontEnd::alertify('theme');
        if (isset($this->uri[1])) {
            switch ($this->uri[1]) {
                case 'add-student':
                    $stylesheets .= FontEnd::datepicker('css');
                    //$stylesheets .= FontEnd::jquery_ui('css');
                    $stylesheets .= FontEnd::jquery_ui_basetheme('css');
                    //$stylesheets .= FontEnd::jquery_ui_deftheme();
                    break;
            }
        }
        return $stylesheets;
    }

    public function stu_form_validate(){
        return 0;
    }

    public function add_student($data_array){
        $pdo = $this->database->getPdo();
        $data = $this->database->escape_array($data_array);
        $sql = 'INSERT INTO student_info_for_testimonial
                SET tcert_id = :tc_id,
                    stu_name = :name, 
                    father = :father,
                    mother = :mother,
                    gender = :gender,
                    village = :village,
                    post_office = :post_office,
                    post_code = :post_code,
                    upazilla = :upazilla,
                    district = :district,
                    exam_name = :exam,
                    borad_name = :borad,
                    exam_year = :exam_year, 
                    group_tread = :group_tread,
                    result = :result,
                    result_status = :status,
                    roll_no = :roll_no,
                    exam_centre = :centre,
                    reg_no = :reg_no,
                    date_of_birth = :dob,
                    session = :session,
                    phone_number = :phone';

        $stmt = $pdo->prepare($sql);

        $tchart_id = strtoupper(substr($data['exam'],0,1)).'-'.substr($data['session'],strlen($data['session'])-2,2).substr($data['year'],2,2).$data['roll_no'];

        $flag = $stmt->execute([
            'name' => $data['student_name'],
            'father' => $data['father_name'],
            'mother' => $data['mother_name'],
            'gender' => $data['gender'],
            'village' => $data['village'],
            'post_office' => $data['postoffice'],
            'post_code' => $data['postcode'],
            'upazilla' => $data['upazilla'],
            'district' => $data['district'],
            'exam' => $data['exam'],
            'borad' => $data['board'],
            'exam_year' => $data['year'],
            'group_tread' => $data['group'],
            'result' => $data['result'],
            'status' => $data['status'],
            'roll_no' => $data['roll_no'],
            'centre' => $data['centre'],
            'reg_no' => $data['reg_no'],
            'dob' => $data['dateofbirth'],
            'session' => $data['session'],
            'phone' => $data['phone'],
            'tc_id' => $tchart_id
        ]);
        if ($flag)
            return "Record insert successfully";
        return 'Insert failed! Something went wrong';
    }

    public function student_list(){
        $query = "SELECT * FROM student_info_for_testimonial";
        $pdo = $this->database->getPdo();
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function temp_list(){
        $query = "SELECT * FROM temp_list_for_testimonial";
        $pdo = $this->database->getPdo();
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }


} // End for Student Module