<?php

namespace modules;

use libraries\Database;
use libraries\Session;
use libraries\Tools;

global $uri;

class Delete{
    protected $db = null;
    public function __construct(){
        $this->db = new Database();
        $this->delete();
    }

    private function delete_from_db($table, $column, $identifier){
        $query = "DELETE FROM $table WHERE $column = '$identifier'";
        if ($this->db->delete($query))
            return 1;
        return 0;
    }

    private function del_upl_dir_file($file_name, $dir_loc){
        $file = UPL_DIR . $dir_loc . D_S . $file_name;
        if (file_exists($file))
            unlink($file);
    }

    private function back($loc=null){
        if ($loc)
            Tools::redirect($loc);
        Tools::redirect($_SERVER['HTTP_REFERER']);
    }

    private function set_errmsg($msg=''){
        if($msg):
            Session::set("err_msg", $msg);
        else:
            Session::set("err_msg", "Deleting unsuccessful");
        endif;
    }

    private function set_deletmsg($msg = ''){
        if($msg):
            Session::set("message", $msg);
        else:
            Session::set("message", "Deleted Successfully");
        endif;
    }

    private function delete(){

        if(isset($_GET['student'])){
            $this->delete_student();;
        } else if (isset($_GET['temp'])){
            $this->delete_temp_stu();
        } else if (isset($_GET['csv'])){
            $this->delete_csv();
        } else {
            $this->back();
        }



    }

    private function delete_student(){
        $student = empty($_GET['stud-id'])?false:$_GET['stud-id'];
        if ($student){
            $delete = $this->delete_from_db('student_info_for_testimonial','sl_id',$student);
            if ($delete){
                $this->set_deletmsg();
                $this->back();
            } else {
                $this->set_errmsg();
                $this->back();
            }
        } else {
            $this->back();
        }
    }

    private function delete_temp_stu(){
        $student = empty($_GET['stu-id'])?false:$_GET['stu-id'];
        if ($student){
            $delete = $this->delete_from_db('temp_list_for_testimonial','temp_id',$student);
            if ($delete){
                $this->set_deletmsg();
                $this->back();
            } else {
                $this->set_errmsg();
                $this->back();
            }
        } else {
            $this->back();
        }
    }

    private function delete_csv(){
        $file_hash = empty($_GET['file'])?false:$_GET['file'];
        if ($file_hash){
            $query = $this->db->select("SELECT file_name FROM imported_csv_files WHERE hash = '$file_hash'");
            $file = $query ? $query->fetch_object() : false;
            $delete = $this->delete_from_db('imported_csv_files','hash',$file_hash);
            if ($delete){
                if ($file)
                    $this->del_upl_dir_file($file->file_name, 'csv');
                $this->set_deletmsg();
                //Tools::redirect(BASE_URL . "uploaded-csv");
                $this->back(BASE_URL.'uploaded-csv');
            } else {
                $this->set_errmsg();
                $this->back();
            }
        } else {
            $this->back();
        }
    }

}


