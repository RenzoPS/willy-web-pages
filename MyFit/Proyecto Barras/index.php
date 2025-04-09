<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img/icono.png" alt="">
    
    <title>MyFit</title>
</head>
<body>
    <div class="hidden" id="oscuridad" onclick="cerrar('ingresoMateriales')"></div>
    <header>
        <a href="index.php"><h1>MyFIT</h1></a>
    </header>
    <nav>

    </nav>
    <main>
        <div id="botones">
            <a id="btnMateriales" onclick="ocultarMostrar('ingresoMateriales'), ocultarMostrar('oscuridad')">Ingresar materiales</a>
            <a href="fabricar.php" id="btnFabricar">Fabricar equipamiento</a>
            <a href="crear.php" id="btnCrearKit">Crear Kits</a>
            <a href="kits.php" id="btnKits">Armar Kits</a>
            <a href="verStock.php" id="btnStock">Ver stock</a>
        </div>
        <form method="POST" action="php/ingresarMaterial.php" class="hidden" id="ingresoMateriales">
            <p>Materiales</p>
            <div id="formFuncional">
                <select name="tipoMaterial" id="tipoMaterial" required>
                    <option value="BarrasM">Barras (m.)</option>
                    <option value="Disco5">Disco (5kg)</option>
                    <option value="Disco10">Disco (10kg)</option>
                    <option value="Mariposa">Mariposa</option> 
                </select>
                <input name="cantidad" type="number" min="1" id="cantidad" required>
                <br>
                <button type="submit" class="zoom">Ingresar</button>
            </div>
        </form>
        
        
    </main>
    <footer>
        
    </footer>
    <script src="script.js"></script>
</body>
</html>