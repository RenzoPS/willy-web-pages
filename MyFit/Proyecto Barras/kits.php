<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img/icono.png" alt="">
    <title>MyFit - Fabricar</title>
</head>
<body>
    <div class="hidden" id="oscuridad" onclick="cerrar('ingresoMateriales')"></div>
    <header>
        <a href="index.php"><h1>MyFIT</h1></a>
    </header>
    <nav>

    </nav>
    <main>
        <div id="divForm">
            <form action="php/armarKit.php" method="POST" id="formArmar">
                <h2>Armar Kit</h2>
                <div id="cont-kit">
                    <div id="tipo_cantidad">
                        <div id="div_barra">
                            <label for="tipoKit">Tipo de barra</label>
                            <select name="tipoKit" id="tipoBarra" required>
                                <option value="a">a</option>
                            <?php
                            include 'php/conexion.php';
                            
                            
                            $ejecutarKits =  mysqli_query($conexion, "SELECT nombreKit FROM kits");
                            if ($ejecutarKits && mysqli_num_rows($ejecutarKits) > 0) {
                                while($fila = mysqli_fetch_assoc($ejecutarKits)){
                                    $nombreKit = htmlspecialchars($fila['nombreKit'], ENT_QUOTES, 'UTF-8');
                                    echo '<option value="'.$nombreKit.'">'.$nombreKit.'</option>';
                                }
                            } else {
                                echo '<option value="" disabled>No hay kits disponibles</option>';
                            }
                            ?>
                            </select>
                        </div>
                            <div id="div_cantidad">
                                <label for="cantidadKit">Cantidad</label>
                                <input name="cantidadKit" type="number" min="1" id="cantidadFabricar" onchange="cambiarResto()">
                            </div>
                    </div>
                
                    <button type="submit" id="botonArmar" class="zoom">🧱Armar</button>
               </div>
            </form>
        </div>
    </main>
    
    
    <footer>
        
    </footer>
    <script src="script.js"></script>
</body>
</html>