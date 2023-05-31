<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

session_start();

if(isset($_POST['logearse'])){

    require_once("LoginUser.php");

    $credenciales = new LoginUser();

    $credenciales -> setEmail($_POST['email']);
    $credenciales -> setPassword($_POST['password']);

    $login = $credenciales -> login();

    if($login){
        header('Location: ../Home/home.php');
    }else{
        echo "<script> alert('Contraseña o Email Incorrectos');document.location='loginRegister.php'</script>";
    }
}



?>