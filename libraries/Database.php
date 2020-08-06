<?php
namespace libraries;

use Exception;
use mysqli;
use PDO;

class Database {
    private $db = null;
    private $pdo = null;

    public function __construct(){
        try {
            $this->db = new mysqli(HST, USR, PWD, DBN);
            if ($this->db->connect_error)
                throw new Exception("Connection failed! Reason: " . $this->db->connect_error);
        }
        catch(Exception $e) {
            exit( "Caught exception: " . $e->getMessage() );
        }
        try {
            $this->pdo = new pdo(DSN, USR, PWD);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (\PDOException $exception){
            exit("Connection failed! Reason: " . $exception->getMessage());
        }
    }

    public function getDb() {
        return $this->db;
    }

    public function getPdo(){
        return $this->pdo;
    }

    public function getAll($table) {
        $stmt = $this->db->query("SELECT * FROM $table");
        if ($stmt->num_rows > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function escape($str){
        return $this->db->real_escape_string($str);
    }

    public function escape_array($array){
        foreach ($array as $key => $item) {
            $array[$key] = $this->escape($item);
        }
        return $array;
    }

    public function db_query($query){
        $stmt = $this->db->query($query);
        if ($stmt)
            return $stmt;
        return false;
    }

    public function select($query){
        $stmt = $this->db->query($query);
        if ($stmt->num_rows > 0) {
            return $stmt;
        }
        return false;
    }

    public function insert($query){
        $insert = $this->db->query($query);
        if ($insert)
            return $insert;
        return false;
    }

    public function update($query){
        $update = $this->db->query($query);
        if ($update)
            return $update;
        return false;
    }

    public function delete($query){
        $delete = $this->db->query($query);
        if ($delete)
            return $delete;
        return false;
    }


} //end of class

//$result_set = $pdo->prepare("INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`) VALUES (:username, :password, :first_name, :last_name)");
//$result_set->execute(array(
//    ':username' => '~user',
//    ':password' => '~pass',
//    ':first_name' => '~John',
//    ':last_name' => '~Doe'
//));