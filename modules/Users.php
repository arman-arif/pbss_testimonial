<?php
namespace modules;
use libraries\Database;

class Users {
    private $db = null;
    private $table = 'members';

    public function __construct() {
        $this->db = new Database();
    }

    public function getUser($id){
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        return $this->db->select($sql);
    }

    public function getUsers(){
        return $this->db->getAll($this->table);
    }

}