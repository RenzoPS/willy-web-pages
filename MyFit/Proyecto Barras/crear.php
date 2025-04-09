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
        <form action="php/crearKit.php" method="POST" id="formCrear">
            <h2 id="tituloCrear">Crear Kit</h2>
            <label for="nombreKit">Nombre</label>
            <input type="text" id="nombreKit" name="nombreKit" placeholder="Ingrese el nombre" required>
            <div class="container-flex">
                <label for="barraChica">Barra Chica</label>
                <input type="number" id="barraChica" name="barraChica" min=1>
            </div>
            <div class="container-flex">
                <label for="barraMediana">Barra Mediana</label>
                <input type="number" id="barraMediana" name="barraMediana"min=1>
            </div>
            <div class="container-flex">
                <label for="barraGrande">Barra Grande</label>
                <input type="number" id="barraGrande" name="barraGrande"min=1>
            </div>
            <div class="container-flex">
                <label for="disco5">Disco 5KG</label>
                <input type="number" id="disco5" name="disco5"min=1>
            </div>
            <div class="container-flex">
                <label for="disco10">Disco 10KG</label>
                <input type="number" id="disco10" name="disco10"min=1>
            </div>
            <div class="container-flex">
                <label for="mariposa">Mariposa</label>
                <input type="number" id="mariposa" name="mariposa"min=1>
            </div>
            <button type="submit" id="botonCrear" class="zoom">🔧Crear</button>
        </form>
    </div>
</main>
    
    <footer>
        
    </footer>
    <script src="script.js"></script>
</body>
</html>