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

    $registrarse-> insertData();

    
    echo "<script> alert('el usuario ha sido guardado satisfactoriamente');document.location='loginRegister.php'</script>";
}

?>