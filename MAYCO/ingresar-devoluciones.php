<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO devoluciones (idEnvio, razon, estadoPago) VALUES (?, ?, ?)");
        $stmt->execute([
            $_POST['idEnvio'],
            $_POST['razon'],
            $_POST['estadoPago']
        ]);
        $mensaje = "Devolución registrada exitosamente";
    } catch(PDOException $e) {
        $error = "Error al registrar devolución: " . $e->getMessage();
    }
}

// Obtener lista de envíos para el select
$envios = $pdo->query("SELECT idEnvio FROM envios")->fetchAll();
?>

<?php include 'header.php'; ?>

<main>
    <div class="form-container">
        <h2>Ingresar Devolución</h2>
        <?php if (isset($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="idEnvio">Número de Pedido:</label>
                <select id="idEnvio" name="idEnvio" required>
                    <?php foreach ($envios as $envio): ?>
                        <option value="<?= $envio['idEnvio'] ?>"><?= htmlspecialchars($envio['idEnvio']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="razon">Motivo de Reclamo:</label>
                <textarea id="razon" name="razon" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="estadoPago">Estado de Pago:</label>
                <select id="estadoPago" name="estadoPago" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Procesado">Procesado</option>
                    <option value="Rechazado">Rechazado</option>
                </select>
            </div>
            
            <button type="submit" class="btn">Enviar</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>