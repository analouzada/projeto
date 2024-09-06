<?php
require_once 'config/config.php';
require_once 'controllers/LocalidadeController.php';

$controller = new LocalidadeController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !empty($_POST['rua']) && !empty($_POST['bairro']) && !empty($_POST['numero']) && !empty($_POST['cep']) && 
        !empty($_POST['cidade']) && !empty($_POST['estado']) && !empty($_POST['pais'])
    ) {
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $numero = $_POST['numero'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];

        // Assuming criarLocalidade is a method in LocalidadeController for saving location data
        $controller->criarLocalidade($rua, $bairro, $numero, $cep, $cidade, $estado, $pais);
        header("Location: listalocalidade.php");
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
    <title>Registrar - Localidade</title>
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
<h1>Registrar</h1>
<div class="form-input">
<label id="direction">Rua</label>
<input type="text" name="rua" placeholder="Rua">

<label id="direction">Bairro</label>
<input type="text" name="bairro" placeholder="Bairro">

<label id="direction">Número</label>
<input type="text" name="numero" placeholder="Número">

<label id="direction">CEP</label>
<input type="text" name="cep" placeholder="CEP">

<label id="direction">Cidade</label>
<input type="text" name="cidade" placeholder="Cidade">

<label id="direction">Estado</label>
<input type="text" name="estado" placeholder="Estado">

<label id="direction">País</label>
<input type="text" name="pais" placeholder="País">



<div class="r-button">
<button type="submit">Registrar</button>
</div>
</div>
</form>
</div>
<!--Formulário de registro-->
</body>
</html>