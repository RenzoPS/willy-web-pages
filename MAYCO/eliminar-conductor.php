<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM conductores WHERE idConductor = ?");
        $stmt->execute([$id]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se encontró el conductor o ya fue eliminado.']);
        }
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Error al eliminar el conductor: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Solicitud inválida.']);
}