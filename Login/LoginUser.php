<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once ('../Config/db.php');
require_once ('../Config/conectar.php');

class LoginUser extends Conectar{
    private $id;
    private $email;
    private $password;
    private $username;

    public function __construct($id=0, $email="", $username="", $password="", $dbCnx=""){
        $this->id = $id;
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

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email= $email;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username= $username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password= $password;
    }

    public function fetchAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm-> execute();
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email= ? AND password = ?");
            $stm -> execute([$this->email, md5($this->password)]);
            $user = $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['password'] = $user[0]['password'];
                $_SESSION['username'] = $user[0]['username'];
                return true;
            }else{
                false;
            }
        } catch (Exception $e) {
             return $e->getMessage();
        }
    }
}
?>


