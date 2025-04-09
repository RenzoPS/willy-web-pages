<?php

    $host = "bafibxyhsgmttezy2etd-mysql.services.clever-cloud.com";          
    $usuario = "uayese2deroksko6";
    $contrasena = "RJaOeDA6GoAuidAI2Jul";
    $base_de_datos = "bafibxyhsgmttezy2etd";
   
    /*
    $host = "localhost";          
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "reservas_paintball";
    */

    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos); 
    /*
    if($conexion){
        echo "Se logró la conexión con : ",$base_de_datos; 
    } else {
        echo "No se pudo conectar con: ",$base_de_datos;
    }
    */
?>
