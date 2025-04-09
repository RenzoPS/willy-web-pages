<?php
    include 'php/conexion.php';
    session_start();
    if (!isset($_SESSION['nombre_apellido'])) {
        echo '
            <script>
                alert("Debe tener una sesion iniciada");
                window.location = "index.php";
            </script>
            exit();
        ';
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">
    <link rel="shortcut icon" href="./imagenes/logoPaintball.png">
    <title>Reservas de campo de PaintBall</title>
</head>
<body id="bodyReserva">
    <img src="imagenes/fondo.jpg"  class="" id="fondo">
    <div id="parteArriba">
        <header>
            <a href="index.php"><h1 class="zoom">PAINTBALL</h1></a>
        </header>
    </div>
    <main>
        <div class="reservas">
            <table class="tabla_reservas">
                <thead>
                    <tr class="fondo-tabla">
                        <th>CAMPO</th>
                        <th>FECHA</th>
                        <th>HORA INICIO</th>
                        <th>HORA FIN</th>
                        <th>PRECIO</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>
                <tbody class="tabla_reservas">
                <?php
                    $id_usuario = $_SESSION['id_usuario'];
                    $reservas = mysqli_query($conexion,"SELECT * FROM reservas WHERE id_usuario = '$id_usuario'"); 


                    while ($row2 = mysqli_fetch_assoc($reservas)){ //por cada row de reservas se crea una nueva fila de la reserva     
                        $id_reserva = $row2['id_reserva'];
                        $campo = $row2['campo'];
                        $fecha = $row2['fecha'];
                        $hora_inicio = $row2['hora_inicio'];
                        $hora_fin = $row2['hora_fin'];
                        if ($campo == 'Estandar'){
                            $precio = "$10000";
                        }elseif ($campo == 'Grande'){
                            $precio = "$20000";
                        }elseif ($campo == 'Grandioso'){
                            $precio = "$30000";
                        }
                        $comprobar_estado = mysqli_query($conexion,"SELECT id_reserva FROM pagos WHERE id_reserva = '$id_reserva'"); 
                        if(mysqli_num_rows($comprobar_estado) > 0){
                            $estado = "Pago Realizado";
                        }
                        else{
                            $estado = "Pago Pendiente";
                        }
                        echo'
                        <tr>
                    
                            <td>'.$campo.'</td>
                            <td>'.$fecha.'</td>
                            <td>'.$hora_inicio.'</td>
                            <td>'.$hora_fin.'</td>
                            <td>'.$precio.'</td>
                            <td>'.$estado.'</td>
                                
                        </tr>
                    
                        ';

                    }
                    
                ?>
                </tbody>
            </table>
            <div class="botones">
                <?php
                    
                    $reservas = mysqli_query($conexion, "SELECT * FROM reservas WHERE id_usuario = '$id_usuario'"); 
                    while ($row2 = mysqli_fetch_assoc($reservas)) {
                        $id_reserva = $row2['id_reserva'];
                        echo '<button id="'. $id_reserva .'" onclick="borrarReserva('.$id_reserva.')">❌</button>';
                    }
                ?>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
    <script>
        function borrarReserva(id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta reserva?")) {
                // Realizar una petición fetch
                fetch('php/borrar_reservas.php?id=' + id, {
                    method: 'GET',
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'exito') {
                        alert("Reserva eliminada exitosamente");
                        location.reload();
                    } else {
                        alert("Hubo un problema al eliminar la reserva");
                    }
                });
            }
        }
    </script>


</body>
</html>