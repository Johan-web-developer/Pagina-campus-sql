<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once ('../Config/db.php');
require_once ('../Config/conectar.php');
class RegistroUser extends Conectar{
    private $id;
    private $idCamper;
    private $email;
    private $username;
    private $password;

    public function __construct($id=0, $idCamper=0, $email="", $username="", $password="", $dbCnx=""){
        $this->id = $id;
        $this->idCamper = $idCamper;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        parent::__construct($dbCnx);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id= $id;
    }

    public function getidCamper(){
        return $this->idCamper;
    }

    public function setidCamper($idCamper){
        $this->idCamper = $idCamper;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email= $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password= $password;
    }


    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO users (idCamper, email, username, password) VALUES(?,?,?,?)");
            $stm -> execute([$this->idCamper, $this->email, $this->username, md5($this->password)]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}



?>