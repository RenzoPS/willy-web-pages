<?php
    session_start(); // Iniciar la sesión si no está ya iniciada

    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Si se utiliza una cookie de sesión, también la eliminamos
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalmente, destruir la sesión
    $session_destroyed = session_destroy();

    if($session_destroyed){
        echo'
            <script>
                alert("Se cerró la sesion correctamente");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo'
            <script>
                alert("No se pudo cerrar la session correctamente");
                window.location = "../index.php";
            </script>
        ';
    }

?>
