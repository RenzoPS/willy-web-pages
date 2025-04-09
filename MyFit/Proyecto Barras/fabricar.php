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
            <form action="php/fabricarEquipamiento.php" method="POST" id="formFabricar">
                <h2>Fabricar</h2>
                <p>Materiales Actuales</p>
                <div id="cantidadConResta">
                <?php 
                    include 'php/conexion.php';
                    $material = mysqli_query($conexion,"SELECT * FROM materiales WHERE idMaterial = 1"); 
                    $row1 = mysqli_fetch_assoc($material);
                    $cantidadMaterial = $row1['cantidadMaterial'];
                echo'
                <p id="cantidadMaterialesFabricar">'.$cantidadMaterial.'</p>
                ';
                ?>
                    <p id="resta">-0</p>
                </div>
                <div id="tipo_cantidad">
                    <div id="div_barra">
                        <label for="tipoBarra">Tipo de barra</label>
                        <select name="tipoBarra" id="tipoBarra" onchange="cambiarResto()" required>
                            <option value="Barra chica">chica</option>
                            <option value="Barra mediana">mediana</option>
                            <option value="Barra grande">grande</option>
                        </select>
                    </div>
                    <div id="div_cantidad">
                        <label for="cantidadFabricar">Cantidad</label>
                        <input name="cantidadFabricar" type="number" min="1" id="cantidadFabricar" onchange="cambiarResto()">
                    </div>
                </div>

               <button type="submit" id="botonFabricar" class="zoom">🔨Fabricar</button>
            </form>
        </div>
    </main>
    
    
    <footer>
        
    </footer>
    <script src="script.js"></script>
</body>
</html>