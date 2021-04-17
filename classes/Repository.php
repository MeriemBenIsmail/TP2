<?php
include_once 'autoload.php';

class Repository
{
    protected $bd;
    protected $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->bd = ConnexionBD::getInstance();
    }

    public function findAll() {
        $request = "select * from ".$this->tableName;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id) {
        $request = "select * from ".$this->tableName ." where id = ?";
        $response =$this->bd->prepare($request);
        $response->execute([$id]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function findByDoubleId($id1,$id2) {
        $request = "select * from ".$this->tableName ." where username= ? and pass=?";
        $response =$this->bd->prepare($request);
        $response->execute([$id1,$id2]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function add($val1,$val2){
        $request = "INSERT INTO `users` (`username`, `pass`) VALUES (".$val1.", ".$val2.")"; 
        $response =$this->bd->prepare($request);
        $response->execute([]);
    }
}