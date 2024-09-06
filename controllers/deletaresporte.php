<?php
session_start();
include_once '../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../listaesporte.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM esporte WHERE id = ?');
$stmt->execute([$id]);

header('Location: ../listaesporte.php');
exit;
?>