<?php
session_start();
include_once '../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../listalocalidade.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM localidade WHERE id = ?');
$stmt->execute([$id]);

header('Location: ../listalocalidade.php');
exit;
?>