<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


if (isset($_POST['guardar'])){
    require_once("config.php");

    $config = new Config();

    $config-> setNombres($_POST['nombres']);
    $config-> setDireccion($_POST['direccion']);
    $config-> setLogros($_POST['logros']);
    $config-> setSer($_POST['ser']);
    $config-> setSkill($_POST['skill']);
    $config-> setReview($_POST['review']);
    $config-> setIngles($_POST['ingles']);

    $config-> insertData();

    echo "<script> alert('los datos fueron guardados satisfactoriamente');document.location='estudiantes.php'</script>";
}

?>