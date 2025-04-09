<?php
include 'conexion.php';
$nombre = $_POST['nombreKit'];
$barraChica = $_POST['barraChica'];
$barraMediana = $_POST['barraMediana'];
$barraGrande = $_POST['barraGrande'];
$disco5 = $_POST['disco5'];
$disco10 = $_POST['disco10'];
$mariposa = $_POST['mariposa'];


if ($barraChica == NULL) {
    $barraChica = 0;
}

if ($barraMediana == NULL) {
    $barraMediana = 0;
}

if ($barraGrande == NULL) {
    $barraGrande = 0;
}

if ($disco5 == NULL) {
    $disco5 = 0;
}

if ($disco10 == NULL) {
    $disco10 = 0;
}

if ($mariposa == NULL) {
    $mariposa = 0;
}



$ejecutarQuery = mysqli_query($conexion, "INSERT INTO kits(nombreKit, cantidadKit, equipo1, cantidad1, equipo2, cantidad2, equipo3, cantidad3, equipo4, cantidad4, equipo5, cantidad5,equipo6, cantidad6) VALUES('$nombre', 0,'Barra chica' ,$barraChica,'Barra mediana' ,$barraMediana,'Barra grande' ,$barraGrande,'Disco5kg' ,$disco5,'Disco 10kg' ,$disco10,'Mariposa',$mariposa)");

if($ejecutarQuery){
    echo '
    <script>
        alert("Se creó el kit");
        window.location = "../index.php";
    </script>
    ';
}

else{
    echo '
    <script>
        alert("Error al crear el kit");
        window.location = "../index.php";
    </script>
    ';
}