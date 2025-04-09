<?php



    $host = "localhost";          
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "gym";
 

    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos); 
    /*
    if($conexion){
        echo "Se logró la conexión con : ",$base_de_datos; 
    } else {
        echo "No se pudo conectar con: ",$base_de_datos;
    }
    */
?>