<?php
require_once 'config/config.php';
require_once 'controllers/TreinadorController.php';
?>
<?php
$controller = new TreinadorController($pdo);

$controller->exibirListaTreinador();
?>
<a href="register-t.php">Registrar Novo?</a>