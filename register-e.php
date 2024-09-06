<?php
require_once 'config/config.php';
require_once 'controllers/EsporteController.php';

$controller = new EsporteController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['modalidade']) && !empty($_POST['ano_olimpiada'])) {
        $modalidade = $_POST['modalidade'];
        $ano_olimpiada = $_POST['ano_olimpiada'];

        $controller->criarEsporte($modalidade, $ano_olimpiada);

    } else {
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sport</title>
    <link rel="shortcut icon" href="public/assets/ico/bola-de-futebol.png" type="image/x-icon">
    <link rel="stylesheet" href="public/assets/css/estilo01.css">
</head>
<body>
<!--Fundo do Site-->
<div class="bg">
<img src="public/assets/img/motivational-soccer-texture-design-1242041139700170773.jpeg">

<!--Fundo do Site-->

<!--Formulário de registro-->
<div class="register-form">
<form method="post">
<div class="form-ico">
<img src="public/assets/img/pngtree-football-championship-realistic-soccer-ball-isolated-png-image_6125491.png">    
</div>
<h1>Register</h1>
<div class="form-input">
<label id="direction">Modalidade</label>
<input type="text" name="modalidade" placeholder="Modalidade">

<label id="direction">Ano da olimpiada</label>
<input type="text" name="ano_olimpiada" placeholder="Ano da olimpiada">

<div class="r-button">
<button type="submit">Register</button>
</div>
</div>
</form>
</div>
<!--Formulário de registro-->
</body>
</html>