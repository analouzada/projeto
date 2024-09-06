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
<form>
<div class="form-ico">
<img src="public/assets/img/pngtree-football-championship-realistic-soccer-ball-isolated-png-image_6125491.png">    
</div>
<h1>Register</h1>
<div class="form-input">
<label id="direction">Street</label>
<input type="text" name="street" placeholder="Street">

<label id="direction">Neighborhood</label>
<input type="text" name="neighborhood" placeholder="Neighborhood">

<label id="direction">Number</label>
<input type="text" name="number" placeholder="Number">

<label id="direction">CEP</label>
<input type="text" name="cep" placeholder="CEP">

<label id="direction">City</label>
<input type="text" name="city" placeholder="City">

<label id="direction">State</label>
<input type="text" name="state" placeholder="State">

<label id="direction">Country</label>
<input type="text" name="country" placeholder="Country">



<div class="r-button">
<button>Register</button>
</div>
</div>
</form>
</div>
<!--Formulário de registro-->
</body>
</html>