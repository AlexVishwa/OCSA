<?php
class Dbconnection{
public $db;
private $host;
private $dbname;
private $user;
private $pass;
function __construct(){
    try {
       $this->host='localhost';
        $this->dbname='users';
        $this->user='ocsa';
        $this->pass='ocsa@123';
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $this->db;
        
    } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
    }
}
}
?>