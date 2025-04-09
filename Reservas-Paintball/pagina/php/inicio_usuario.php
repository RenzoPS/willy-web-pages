<?php
    include 'conexion.php';
    ini_set('session.cookie_lifetime', 3600);
    session_start();
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];
    


    $verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo_electronico = '$correo_electronico' AND contrasena = '$contrasena'");

    if (mysqli_num_rows($verificar_usuario) > 0) {
        
        echo'
            <script>
                alert("Se inicio sesion correctamente. El correo es:  ' . $correo_electronico . '");
                window.location = "../index.php";
            </script>
        ';
        
        $row = mysqli_fetch_assoc($verificar_usuario);
        $nombre_apellido = $row['nombre_apellido'];
        $consultar_id = "SELECT id_usuario FROM usuarios WHERE correo_electronico = '$correo_electronico'";
        $result_id= mysqli_query($conexion, $consultar_id);
        $row = mysqli_fetch_assoc($result_id);
        $id_usuario = $row['id_usuario'];
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre_apellido'] = $nombre_apellido;
        $_SESSION['correo_electronico'] = $correo_electronico;
    }
    
    else{
        echo'
            <script>
                alert("No pudo ingresar sesion");
                window.location = "../index.php";
            </script>
        '
        ;
    }

?>