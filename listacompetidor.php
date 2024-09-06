<?php
require_once 'config/config.php';
require_once 'controllers/CompetidorController.php';
?>
<?php
$controller = new CompetidorController($pdo);

$controller->exibirListaCompetidor();
?>
<a href="register-c.php">Registrar Novo?</a>