<?php
    include("connection.php");
    $link=connection();
    $email = $_POST['email'];
    $contraseña = $_POST['pass'];
    $consulta = "SELECT * FROM usuario WHERE email='".$email."'";
    $result = mysqli_query($link, $consulta);
    include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
    $csa->ComprobarLogin($result, $email, $contraseña);
    mysqli_free_result($result);
?>