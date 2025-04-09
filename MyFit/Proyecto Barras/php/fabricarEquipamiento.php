<?php
include 'conexion.php';
$ejecutarCantidadMaterial = mysqli_query($conexion, "SELECT cantidadMaterial FROM materiales WHERE idMaterial = 1");
$row1 = mysqli_fetch_assoc($ejecutarCantidadMaterial);
$cantidadMaterial = $row1['cantidadMaterial'];
$cantidadFabricar = $_POST['cantidadFabricar'];
$tipoBarra = $_POST['tipoBarra'];


if ($tipoBarra === "Barra chica"){
    $valorBarra = 1; 
}
elseif ($tipoBarra === "Barra mediana"){
    $valorBarra = 1.5;
}
elseif ($tipoBarra === "Barra grande"){
    $valorBarra = 2;
}
$totalResta = $cantidadFabricar * $valorBarra;

$queryMaterial = "UPDATE materiales SET cantidadMaterial = cantidadMaterial-$totalResta where idMaterial = 1";
$queryEquipamiento = "UPDATE equipo SET cantidadEquipo = cantidadEquipo+ $cantidadFabricar where nombreEquipo= '$tipoBarra'";


if($totalResta <= $cantidadMaterial){
    $ejecutarMaterial = mysqli_query($conexion, $queryMaterial);
    $ejecutarEquipamiento = mysqli_query($conexion, $queryEquipamiento);
    echo '
            <script>
                alert("Se fabrico");
                window.location = "../index.php";
            </script>
        ';
}

else{
    echo '
    <script>
        alert("No se tienen los materiales necesarios");
        window.location = "../index.php";
    </script>
';
}


