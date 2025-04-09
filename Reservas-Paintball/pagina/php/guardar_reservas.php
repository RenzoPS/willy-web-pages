<?php
    include 'conexion.php';
    session_start();

    $correo_electronico = $_SESSION['correo_electronico'];
    $consultar_id = "SELECT id_usuario FROM usuarios WHERE correo_electronico = '$correo_electronico'";
    $result_id= mysqli_query($conexion, $consultar_id);
    $row = mysqli_fetch_assoc($result_id);
    $id_usuario = $row['id_usuario'];
    $fecha = $_POST['fecha'];
    $hora_inicio = $_POST['hora_inicio'] ;
    $campo = $_POST['campo'];
    $fechaHora = new DateTime($hora_inicio);
    $fechaHora->add(new DateInterval('PT1H'));
    $hora_fin = $fechaHora->format('H:i:s');

    $query = "INSERT INTO reservas(id_usuario, campo, fecha, hora_inicio, hora_fin) 
            VALUES ('$id_usuario','$campo','$fecha','$hora_inicio','$hora_fin')";


    $verificar_horario = mysqli_query($conexion, "SELECT * FROM reservas WHERE hora_inicio='$hora_inicio' AND fecha='$fecha' AND campo='$campo'");
    
    if(mysqli_num_rows($verificar_horario) == 0){
        $ejecutar = mysqli_query($conexion, $query);
        if ($ejecutar) {   
            echo'
                <script>
                    alert("Se guardo la reserva correctamente");
                    window.location = "../index.php";
                </script>
            ';
        }
        
        else{
            echo'
                <script>
                    alert("No se pudo guardar la reserva");
                    window.location = "../index.php";
                </script>
            '
            ;
        }
    }
    else{
        echo'
        <script>
            alert("Ese campo está reservado para esa hora. Pruebe con otra");
            window.location = "../reserva.php";
        </script>
    ';
    }


?>

