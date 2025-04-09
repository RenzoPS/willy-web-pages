<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img/icono.png" alt="">
    <title>MyFit - Ver Stock</title>
</head>
<body>
    <div class="hidden" id="oscuridad" onclick="cerrar('ingresoMateriales')"></div>
    <header>
        <a href="index.php"><h1>MyFIT</h1></a>
    </header>
    <nav>
        
    </nav>
    <main>
        
        <div class="materiales">
            <h2 class="centrado">Materiales</h2>
            <table class="tabla">
                <thead>
                    <tr class="fondo-tabla">
                        <th>Tipo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody class="tabla">
                    <?php
                    include 'php/conexion.php';
                    $material = mysqli_query($conexion,"SELECT * FROM materiales WHERE idMaterial = 1"); 
                    $row1 = mysqli_fetch_assoc($material);
                    $cantidadMaterial = $row1['cantidadMaterial'];
                    $tipoMaterial = $row1['nombreMaterial'];
                    echo'
                    <tr>
                        <td>'.$tipoMaterial.'</td>
                        <td>'.$cantidadMaterial.'</td>
                    </tr>
                
                    ';
                ?>
                </tbody>
            </table>
        </div>
        <div class="equipamiento">
            <h2 class="centrado">Equipamientos</h2>
            <table class="tabla">
                <thead>
                    <tr class="fondo-tabla">
                        <th>Tipo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody class="tabla">
                <?php
                    $equipamiento = mysqli_query($conexion,"SELECT * FROM equipo"); 
                    while ($row2 = mysqli_fetch_assoc($equipamiento)){ 
                        $tipo = $row2['nombreEquipo'];
                        $cantidad = $row2['cantidadEquipo'];
                        echo'
                        <tr>
                            <td>'.$tipo.'</td>
                            <td>'.$cantidad.'</td>
                        </tr>
                        ';
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="kits">
            <h2 class="centrado">Kits</h2>
            <table class="tabla">
                <thead>
                    <tr class="fondo-tabla">
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Barra chica</th>
                        <th>Barra mediana</th>
                        <th>Barra grande</th>
                        <th>Disco 5KG</th>
                        <th>Disco 10KG</th>
                        <th>Mariposa</th>
                    </tr>
                </thead>
                <tbody class="tabla">
                <?php
                    $equipamiento = mysqli_query($conexion,"SELECT * FROM kits"); 
                    while ($row2 = mysqli_fetch_assoc($equipamiento)){ 
                        $nombre = $row2['nombreKit'];
                        $cantidad = $row2['cantidadKit'];
                        $cantidad1 = $row2['cantidad1'];
                        $cantidad2 = $row2['cantidad2'];
                        $cantidad3 = $row2['cantidad3'];
                        $cantidad4 = $row2['cantidad4'];
                        $cantidad5 = $row2['cantidad5'];
                        $cantidad6 = $row2['cantidad6'];
                        if($cantidad1 == NULL){
                            $cantidad1 = 0;
                        }
                        if($cantidad2 == NULL){
                            $cantidad2 = 0;
                        }
                        if($cantidad3 == NULL){
                            $cantidad3 = 0;
                        }
                        if($cantidad4 == NULL){
                            $cantidad4 = 0;
                        }
                        if($cantidad5 == NULL){
                            $cantidad5 = 0;
                        }
                        if($cantidad6 == NULL){
                            $cantidad6 = 0;
                        }

                        echo'
                        <tr>
                            <td>'.$nombre.'</td>
                            <td>'.$cantidad.'</td>
                            <td>'.$cantidad1.'</td>
                            <td>'.$cantidad2.'</td>
                            <td>'.$cantidad3.'</td>
                            <td>'.$cantidad4.'</td>
                            <td>'.$cantidad5.'</td>
                            <td>'.$cantidad6.'</td>
                        </tr>
                        ';

                    }
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        
    </footer>
    <script src="script.js"></script>
</body>
</html>