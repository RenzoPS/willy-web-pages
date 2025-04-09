<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Verificar el destino del envío
        $idEnvio = $_POST['idEnvio'];
        $stmtDestino = $pdo->prepare("SELECT destino FROM envios WHERE idEnvio = ?");
        $stmtDestino->execute([$idEnvio]);
        $destino = $stmtDestino->fetchColumn();

        // Determinar estado de envío con probabilidad si el destino es Rosario
        $estadoEnvio = $_POST['estadoEnvio'];
        if ($destino === 'Rosario' && rand(0, 1) === 1) {
            $estadoEnvio = 'robado';
        }

        // Actualizar el envío con el estado determinado
        $stmt = $pdo->prepare("UPDATE envios SET estadoEnvio = ?, conflicto = ?, fechaEntrega = ?, feedback = ? WHERE idEnvio = ?");
        $stmt->execute([
            $estadoEnvio,
            $_POST['conflicto'],
            $_POST['fechaEntrega'],
            $_POST['feedback'],
            $idEnvio
        ]);

        $mensaje = "Envío actualizado exitosamente";
    } catch(PDOException $e) {
        $error = "Error al actualizar envío: " . $e->getMessage();
    }
}

// Obtener lista de envíos pendientes
$envios = $pdo->query("SELECT idEnvio, fechaPedido FROM envios WHERE estadoEnvio = 'Registrado'")->fetchAll();
?>

<?php include 'header.php'; ?>

<main>
    <div class="form-container">
        <h2>Realizar envíos</h2>
        <?php if (isset($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="idEnvio">ID del envío:</label>
                <select id="idEnvio" name="idEnvio" required>
                    <?php foreach ($envios as $envio): ?>
                        <option value="<?= $envio['idEnvio'] ?>"><?= htmlspecialchars($envio['idEnvio']) . ' - ' . htmlspecialchars($envio['fechaPedido']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="estadoEnvio">Estado del envío:</label>
                <input type="text" id="estadoEnvio" name="estadoEnvio" required>
            </div>
            
            <div class="form-group">
                <label for="conflicto">Conflicto:</label>
                <textarea id="conflicto" name="conflicto"></textarea>
            </div>
            
            <div class="form-group">
                <label for="fechaEntrega">Fecha de entrega:</label>
                <input type="date" id="fechaEntrega" name="fechaEntrega" required>
            </div>
            
            <div class="form-group">
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback"></textarea>
            </div>
            
            <button type="submit" class="btn">Enviar</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
