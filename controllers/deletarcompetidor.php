<?php
session_start();
include_once '../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../listacompetidor.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM competidor WHERE id = ?');
$stmt->execute([$id]);

header('Location: ../listacompetidor.php');
exit;
?>