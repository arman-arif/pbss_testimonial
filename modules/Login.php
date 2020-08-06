<?php
namespace modules;

use libraries\Database;
use libraries\FontEnd;
use libraries\Session;
use libraries\Tools;

class Login {
    private $database = null;
    private $table = 'user_info';
    protected $page_title = null;
    public $message = false;

    public function __construct() {
        $this->database = new Database();
        $this->page_title = "Login";

        if (isset($_POST['usrname'])) {
            $usr = Tools::validate_data($_POST['usrname']);
            $pwd = Tools::validate_data($_POST['passwd']);

            $this->message = $this->user_login($usr, $pwd);
        }
    }

    public function user_login($username, $password){
		
		$username = $this->database->escape($username);
		
		$sql = "SELECT * FROM  {$this->table} WHERE username = '${username}'";
		$result = $this->database->db_query($sql);
		
		if ($result){
			if ($result->num_rows > 0){
                $row = $result->fetch_object();
				if (password_verify($password, $row->passwd)) {
                    $this->set_login_session($row);
                    Tools::goto_last_page();
					Tools::redirect(BASE_URL . "dashboard");
				} elseif (md5($password) == $row->passwd) {
                    $this->set_login_session($row);
                    Tools::goto_last_page();
					Tools::redirect(BASE_URL . "dashboard");
				} else {
					return "Wrong username or password combination";
				}
			} else {
				return "Invalid username or password";
			}
		}
		
		return false;
		
	}

    private function set_login_session($row) {
        Session::set("user_id", $row->id);
        Session::set("user_name", $row->username);
        Session::set("full_name", $row->fullname);
//        Session::set("verify", $row->status);
        Session::set("user_role", $row->user_role);
        Session::set("last_active", time());
    }

    public static function check_login ($uri) {
        if ($uri[0] == 'login' || $uri[0] == 'signup') {
            if (Session::is_set("user_name"))
                Tools::redirect(BASE_URL . "dashboard");
        } else {
            if(!Session::is_set("user_name"))
                Tools::redirect(BASE_URL . "login");
        }

    }

    public function get_view(){
        include PAGE_DIR . 'login.php';
    }

    public function get_title(){
        return $this->page_title;
    }



    public function get_script(){
        $script = "";
        return $script;
    }

    public function get_style(){
        $stylesheets = "
            <style>
                .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }

                @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                        font-size: 3.5rem;
                    }
                }
            </style>
        ";
        $stylesheets .= '<link rel="stylesheet" href="'. BASE_URL . 'assets/css/signin.css">';
        return $stylesheets;
    }

}