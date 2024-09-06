<?php
require_once 'config/config.php';
require_once 'controllers/TreinadorController.php';

$controller = new TreinadorController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['idade']) && !empty($_POST['altura']) && !empty($_POST['peso']) && !empty($_POST['cpf']) && !empty($_POST['rg'])) {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];

        $controller->criarTreinador($nome, $idade, $altura, $peso, $cpf, $rg);
        header("Location: listatreinador.php");
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
    <title>Register - Trainer</title>
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
<label id="direction">Name</label>
<input type="text" name="nome" placeholder="Name">

<label id="direction">Age</label>
<input type="text" name="idade" placeholder="Age">

<label id="direction">Height</label>
<input type="text" name="altura" placeholder="Height">

<label id="direction">Weight</label>
<input type="text" name="peso" placeholder="Weight">

<label id="direction">CPF</label>
<input type="text" name="cpf" placeholder="CPF">

<label id="direction">RG</label>
<input type="text" name="rg" placeholder="RG">


<div class="r-button">
<button type="submit">Register</button>
</div>
</div>
</form>
</div>
<!--Formulário de registro-->
</body>
</html>