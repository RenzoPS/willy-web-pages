<?php
    session_start();
    if (!isset($_SESSION['nombre_apellido'])) {
        echo '
            <script>
                alert("Debe tener una sesion iniciada");
                window.location = "index.php";
            </script>
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
        
        <div id="reservar">
            <form action="php/guardar_reservas.php" method="POST" id="reservaFormulario" >
                <label for="camposElegir">Seleccionar campo:</label>
                <br>
                <select name="campo" id="camposElegir" onchange="opcionPago()">
                    <option value="Estandar" >Estandar</option>
                    <option value="Grande" >Grande</option>
                    <option value="Grandioso" >Grandioso</option>
                </select>
                <br>
                <br>
                <label for="fecha">Fecha de reserva:</label>
                <br>
                <input id="fecha" name="fecha" type="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                <br>
                <br>
                <label for="elegirHoras">Hora de reserva:</label>
                <br>
                <select id="elegirHoras" name="hora_inicio" >
                     <option value="09:00:00">09:00</option>
                     <option value="10:00:00">10:00</option>
                     <option value="11:00:00">11:00</option>
                     <option value="12:00:00">12:00</option>
                     <option value="13:00:00">13:00</option>
                     <option value="14:00:00">14:00</option>
                     <option value="15:00:00">15:00</option>
                     <option value="16:00:00">16:00</option>
                     <option value="17:00:00">17:00</option>
                     <option value="18:00:00">18:00</option>
                     <option value="19:00:00">19:00</option>
                     <option value="20:00:00">20:00</option>
                     <option value="21:00:00">21:00</option>
                     <option value="22:00:00">22:00</option>
                     <option value="23:00:00">23:00</option>
                </select>
                <br>
                <br>
                <button>Confirmar</button>
                <br>
                <!--                 
                <div id=pagos>
                    <button id="checkout-button">Pagar</button>
                    <div id="pagoEstandar">
                        
                    </div>
                    <div id="pagoGrande" class="hidden" >
                        
                    </div>
                    <div id="pagoGrandioso" class="hidden" >
                        
                    </div>
                </div> -->
            </form>
    </main>
    <footer>
    
    </footer>
    <script src="script.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    
</body>
</html>