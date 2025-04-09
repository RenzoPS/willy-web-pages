<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO envios (idConductor, idProducto, destino, estadoEnvio, fechaPedido, fechaEntrega) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['conductor'],
            $_POST['producto'],
            $_POST['destino'],
            'Registrado',
            $_POST['fechaEntrega'],
            NULL
        ]);
        $mensaje = "Envío registrado exitosamente";
    } catch(PDOException $e) {
        $error = "Error al registrar envío: " . $e->getMessage();
    }
}

// Obtener lista de conductores y productos para los selects
$conductores = $pdo->query("SELECT idConductor, nombreConductor FROM conductores")->fetchAll();
$productos = $pdo->query("SELECT idProducto, nombreProducto FROM productos")->fetchAll();
?>

<?php include 'header.php'; ?>

<main>
    <div class="form-container">
        <h2>Registrar envíos</h2>
        <?php if (isset($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre">Nombre y apellido:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="number" id="dni" name="dni" required>
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            
            <div class="form-group">
                <label for="conductor">Conductor:</label>
                <select id="conductor" name="conductor" required>
                    <?php foreach ($conductores as $conductor): ?>
                        <option value="<?= $conductor['idConductor'] ?>"><?= htmlspecialchars($conductor['nombreConductor']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" id="destino" name="destino" required>
            </div>
            
            <div class="form-group">
                <label for="fechaEntrega">Fecha de entrega:</label>
                <input type="date" id="fechaEntrega" name="fechaEntrega" required>
            </div>
            
            <div class="form-group">
                <label for="producto">Producto:</label>
                <select id="producto" name="producto" required>
                    <?php foreach ($productos as $producto): ?>
                        <option value="<?= $producto['idProducto'] ?>"><?= htmlspecialchars($producto['nombreProducto']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" class="btn">Enviar</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>