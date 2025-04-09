<?php
require_once 'config.php';

// Obtener lista de envíos
$envios = $pdo->query("
    SELECT e.*, c.nombreConductor, p.nombreProducto 
    FROM envios e
    JOIN conductores c ON e.idConductor = c.idConductor
    JOIN productos p ON e.idProducto = p.idProducto
")->fetchAll();

// Obtener lista de devoluciones
$devoluciones = $pdo->query("
    SELECT d.*, e.idEnvio
    FROM devoluciones d
    JOIN envios e ON d.idEnvio = e.idEnvio
")->fetchAll();
?>

<?php include 'header.php'; ?>

<main>
    <div class="table-container">
        <h2>Envíos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Conductor</th>
                    <th>Producto</th>
                    <th>Estado</th>
                    <th>Fecha Pedido</th>
                    <th>Fecha Entrega</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($envios as $envio): ?>
                <tr>
                    <td><?= htmlspecialchars($envio['idEnvio']) ?></td>
                    <td><?= htmlspecialchars($envio['nombreConductor']) ?></td>
                    <td><?= htmlspecialchars($envio['nombreProducto']) ?></td>
                    <td><?= htmlspecialchars($envio['estadoEnvio']) ?></td>
                    <td><?= htmlspecialchars($envio['fechaPedido']) ?></td>
                    <td><?= htmlspecialchars($envio['fechaEntrega']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="table-container">
        <h2>Devoluciones</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Envío</th>
                    <th>Razón</th>
                    <th>Estado de Pago</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($devoluciones as $devolucion): ?>
                <tr>
                    <td><?= htmlspecialchars($devolucion['idDevoluciones']) ?></td>
                    <td><?= htmlspecialchars($devolucion['idEnvio']) ?></td>
                    <td><?= htmlspecialchars($devolucion['razon']) ?></td>
                    <td><?= htmlspecialchars($devolucion['estadoPago']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>