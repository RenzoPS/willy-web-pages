<?php
include 'conexion.php';
$cantidadesEquipo = [];
$cantidadKit = $_POST['cantidadKit'];
$tipoKit = $_POST['tipoKit'];
$verificarCantidad = true;

for ($i = 1; $i <= 6; $i++) {
    $resultado = mysqli_query($conexion, "SELECT cantidadEquipo FROM equipo WHERE idEquipo = $i");
    $fila = mysqli_fetch_assoc($resultado);
    $cantidadesEquipo[$i] = $fila['cantidadEquipo'];
}
$cantidadesEquipoKit = [];
$cantidadesEquipoGastar = [];
for ($i = 1; $i <= 6; $i++) {
    $columnaCantidad = 'cantidad' . $i;
    $resultado2 = mysqli_query($conexion, "SELECT $columnaCantidad FROM kits WHERE nombreKit = '$tipoKit'");
    $fila = mysqli_fetch_assoc($resultado2);
    $cantidadesEquipoKit[$i] = $fila[$columnaCantidad];
    $cantidadesEquipoGastar[$i] = $cantidadKit * $cantidadesEquipoKit[$i];
    if($cantidadesEquipoGastar[$i] > $cantidadesEquipo[$i]){
        $verificarCantidad = false;
    }
}


if($verificarCantidad){
    $queryKit = "UPDATE kits SET cantidadKit = cantidadKit+$cantidadKit where nombreKit = '$tipoKit'";

    for ($i = 1; $i <= 6; $i++) {
        $resultado3 = mysqli_query($conexion, "UPDATE equipo SET cantidadEquipo = cantidadEquipo - $cantidadesEquipoGastar[$i] where idEquipo = $i");
    }
    $ejecutarCantidadKits = mysqli_query($conexion, $queryKit);

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
