<?php
namespace modules;

use libraries\FontEnd;

class Home {
    private $database = null;
    protected $page_title = null;
    private $errors = array();
    private $obj_users = null;

    public function __construct() {
        $this->page_title = "Home";
        $this->obj_users = new Users();
    }

    public function get_view(){
        include PAGE_DIR . 'home.php';
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