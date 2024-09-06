<?php
require_once 'config/config.php';
require_once 'controllers/LocalidadeController.php';
?>
<?php
$controller = new LocalidadeController($pdo);

$controller->exibirListaLocalidade();
?>