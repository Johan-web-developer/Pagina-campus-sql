<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['register'])) {
    require_once ('RegistroUser.php');

    $registrarse = new RegistroUser();
    $registrarse->setidCamper(1);
    $registrarse->setEmail($_POST['email']);
    $registrarse->setUsername($_POST['username']);
    $registrarse->setPassword($_POST['password']);

    if ($registrarse->checkUser($_POST['email'])){
        echo "<script> alert('el usuario ya existe');document.location='loginRegister.php'</script>";
    }else{
        $registrarse-> insertData();
        echo "<script> alert('el usuario ha sido registrado existosamente');document.location='../Home/home.php'</script>";
    }
    
    

    
    
}

?>