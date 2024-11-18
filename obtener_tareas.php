<?php
include '../config.php';
header('Content-Type: application/json');

$stmt = $pdo->query("SELECT * FROM tareas");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
