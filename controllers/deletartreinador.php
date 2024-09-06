<?php
session_start();
include_once '../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../listatreinador.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM treinador WHERE id = ?');
$stmt->execute([$id]);

header('Location: ../listatreinador.php');
exit;
?>