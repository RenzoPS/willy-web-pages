<?php
include 'conexion.php';
session_start();
if (isset($_GET['id']) && isset($_SESSION['id_usuario'])) {
    $id_reserva = $_GET['id'];
    $id_usuario = $_SESSION['id_usuario'];
    
    $query = "DELETE FROM reservas WHERE id_reserva = '$id_reserva' AND id_usuario = '$id_usuario'";
    if (mysqli_query($conexion, $query)) {
        echo 'exito';
    } else {
        echo 'fallo';
    }
} else {
    echo 'fallo';
}
?>