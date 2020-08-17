<?php


namespace modules;


use libraries\Controller;
use libraries\Database;
use libraries\FontEnd;

class Certificate implements Controller {
    private $database = null;
    protected $page_title = null;
    private $errors = array();
    private $obj_stud = null;
    private $uri = null;

    public function __construct() {
        global $uri;
        $this->uri = $uri;
        $this->database = new Database();
        $this->page_title = "Certificate";
        $this->obj_stud = new Students();

        if (!isset($this->uri[1]) && $this->uri[0] == 'certificate'){
            $this->page_title = "Certificate";
        } elseif (isset($this->uri[1])){
            switch ($this->uri[1]){
                case 'print':
                    $this->page_title = "Print Certificate";
                    break;
                default:
                    $this->page_title = "Certificate";
                    break;
            }
        }

    }

    public function get_unprinted_testimo(){
        $sql = "SELECT * FROM student_info_for_testimonial WHERE result_status='Passed' AND last_printed IS NULL";
        $pdo = $this->database->getPdo();
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()){
            return $stmt;
        }
        return 0;
    }



    public function get_view(){
        if (!isset($this->uri[1]) && $this->uri[0] == 'certificate'){
            include PAGE_DIR . 'certificate.php';
        } elseif (isset($this->uri[1])){
            switch ($this->uri[1]){
                case 'print':

                    break;
                default:
                    include PAGE_DIR . 'certificate.php';
                    break;
            }
        }

    }

    public function get_title(){
        return $this->page_title;
    }

    public function set_error($error){
        array_push($this->errors, $error);
    }

    public function get_errors(){
        return $this->errors;
    }

    public function get_script(){
        $script = FontEnd::jquery_ui('js');
        $script .= FontEnd::sweetalert2();
        $script .= FontEnd::alertify('js');
        return $script;
    }
    public function get_style(){
        $stylesheets = FontEnd::jquery_ui('css');
        $stylesheets .= FontEnd::alertify('css');
        $stylesheets .= FontEnd::alertify('theme');
        return $stylesheets;
    }
}