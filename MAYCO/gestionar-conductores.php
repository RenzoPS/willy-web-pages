<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO conductores (nombreConductor, dni, edad, mail, domicilio, sueldo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['nombre'],
            $_POST['dni'],
            $_POST['edad'],
            $_POST['mail'],
            $_POST['domicilio'],
            $_POST['sueldo']
        ]);
        $mensaje = "Conductor registrado exitosamente";
    } catch(PDOException $e) {
        $error = "Error al registrar conductor: " . $e->getMessage();
    }
}

// Obtener lista de conductores
$conductores = $pdo->query("SELECT * FROM conductores")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Conductores - MAYCO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="form-container">
            <h2>Registrar Nuevo Conductor</h2>
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
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" required min="18">
                </div>
                
                <div class="form-group">
                    <label for="mail">Mail:</label>
                    <input type="email" id="mail" name="mail" required>
                </div>
                
                <div class="form-group">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" id="domicilio" name="domicilio" required>
                </div>
                
                <div class="form-group">
                    <label for="sueldo">Sueldo:</label>
                    <input type="number" id="sueldo" name="sueldo" step="0.01" required>
                </div>
                
                <button type="submit" class="btn">Enviar</button>
            </form>
        </div>

        <div class="table-container">
            <h2>Lista de Conductores</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Edad</th>
                        <th>Mail</th>
                        <th>Domicilio</th>
                        <th>Sueldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($conductores as $conductor): ?>
                    <tr>
                        <td><?= htmlspecialchars($conductor['idConductor']) ?></td>
                        <td><?= htmlspecialchars($conductor['nombreConductor']) ?></td>
                        <td><?= htmlspecialchars($conductor['dni']) ?></td>
                        <td><?= htmlspecialchars($conductor['edad']) ?></td>
                        <td><?= htmlspecialchars($conductor['mail']) ?></td>
                        <td><?= htmlspecialchars($conductor['domicilio']) ?></td>
                        <td><?= htmlspecialchars($conductor['sueldo']) ?></td>
                        <td>
                            <button class="btn btn-delete" data-id="<?= $conductor['idConductor'] ?>">X</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="scripts.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                if (confirm('¿Estás seguro de que quieres eliminar este conductor?')) {
                    fetch('eliminar-conductor.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'id=' + id
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.closest('tr').remove();
                        } else {
                            alert('Error al eliminar el conductor: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Ocurrió un error al intentar eliminar el conductor.');
                    });
                }
            });
        });
    });
    </script>
</body>
</html>