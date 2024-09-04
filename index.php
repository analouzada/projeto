<?php
require_once 'config.php';
require_once 'controllers/EsporteController.php';
require_once 'controllers/TreinadorController.php';
require_once 'controllers/CompetidorController.php';

$esporteController = new EsporteController($pdo);

if (isset($_POST['modalidade']) && 
    isset($_POST['ano_olimpiada'])) 
{
    $esporteController->criarEsporte($_POST['modalidade'], $_POST['ano_olimpiada']);
}

if (isset($_POST['excluir_esportes']))
{
    $esporteController->excluirEsporte($_POST['excluir_esporte_id']);
}



$esportes = $esporteController->listarEsportes();

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD com MVC e PDO</title>
</head>
<body>
    <h1>Esportes</h1>
    <form method="post">
        <input type="text" name="modalidade" placeholder="Modalidade">
        <input type="text" name="ano_olimpiada" placeholder="Ano da Olimpíada">
        <button type="submit">Adicionar Esporte</button>
    </form>



    <h2>Lista de Esportes</h2>
    <ul>
        <?php foreach ($esportes as $esporte): ?>
            <li><?php echo $esporte['modalidade']; ?> - <?php echo $esporte['ano_olimpiada']; ?></li>
        <?php endforeach; ?>
    </ul>

<h2>Excluir Esportes</h2>
<form method="post">
    <input type="hidden" name="excluir_esportes" value="excluir_esportes" />
        <select name="excluir_esporte_id">
            <?php foreach ($esportes as $esporte): ?>
                <option value="<?php echo $esporte['id_esporte']; ?>"
                ><?php echo $esporte['modalidade']; ?>
            </option>
            <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Esporte</button>
            </form>

            <h2>Atualizar Esporte</h2>
    <form method="post">
        <select ame="esporte_id">
       
        <?php foreach ($esportes as $esporte): ?>
                                <option value="<?php echo $esporte['id_esporte']; ?>"><?php echo $esporte['id_esporte']; ?></option>
                                <?php endforeach; ?>  
        <input type="hidden" name="esporte_id"  value="<?php echo $esporte['id_esporte']; ?>">

        </select>
                <input type="text" name="atualizar_modalidade" placeholder="Nova Modalidade">
        <input type="text" name="atualizar_ano_olimpiada" placeholder="Novo Ano da Olimpíada">
        <button type="submit">Atualizar Esporte</button>
    </form>



</body>
</html>



<?php
require_once 'config.php';
require_once 'controllers/EsporteController.php';
require_once 'controllers/TreinadorController.php';
require_once 'controllers/CompetidorController.php';

$treinadorController = new TreinadorController($pdo);

if (isset($_POST['nome']) && 
    isset($_POST['idade']) &&
    isset($_POST['nacionalidade'])) 
{
    $treinadorController->criarTreinador($_POST['nome'], $_POST['idade'],  $_POST['nacionalidade']);
}


if (isset($_POST['excluir_treinador']))
{
    $treinadorController->excluirTreinador($_POST['excluir_treinador_id']);
}




$treinadores = $treinadorController->listarTreinador();

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD com MVC e PDO</title>
</head>
<body>
    <h1>Treinadores</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="idade" placeholder="Idade">
        <input type="text" name="nacionalidade" placeholder="Nacionalidade">
        <button type="submit">Adicionar Treinador</button>
    </form>

    <h2>Lista de Treinadores</h2>
    <ul>
        <?php foreach ($treinadores as $treinador): ?>
            <li><?php echo $treinador['nome']; ?> - <?php echo $treinador['idade']; ?> - <?php echo $treinador['nacionalidade']; ?></li>
        <?php endforeach; ?>
    </ul>
    <h2>Exclui Treinador</h2>
<form method="post">
<input type="hidden" name="excluir_treinador" value="excluir_treinador" />
        <select name="excluir_treinador_id">
            <?php foreach ($treinadores as $treinador): ?>
                <option value="<?php echo $treinador['id_treinador']; ?>"
                ><?php echo $treinador['nome']; ?>
            </option>
            <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Treinador</button>
            </form>    
</body>
</html>

<?php
$treinadorController->exibirListaTreinador();








$competidorController = new CompetidorController($pdo); 

if (isset($_POST['nome']) && 
    isset($_POST['idade']) &&
    isset($_POST['peso']) &&
    isset($_POST['altura']) &&
    isset($_POST['nacionalidade'])) 
{
    $competidorController->criarCompetidor($_POST['nome'], $_POST['idade'], $_POST['peso'], $_POST['altura'],  $_POST['nacionalidade']);
}


if (isset($_POST['excluir_competidor']))
{
    $competidorController->excluirCompetidor($_POST['excluir_competidor_id']);
}

$competidores = $competidorController->listarCompetidor();

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD com MVC e PDO</title>
</head>
<body>
    <h1>Competidores</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="idade" placeholder="Idade">
        <input type="text" name="peso" placeholder="Peso">
        <input type="text" name="altura" placeholder="Altura">
        <input type="text" name="nacionalidade" placeholder="Nacionalidade">
        <button type="submit">Adicionar Competidor</button>
    </form>

    <h2>Lista de Competidores</h2>
    <ul>
        <?php foreach ($competidores as $competidor): ?>
            <li><?php echo $competidor['nome']; ?> - <?php echo $competidor['idade'];  ?> - <?php echo $competidor['peso'];  ?> - <?php echo $competidor['altura'];  ?> - <?php echo $competidor['nacionalidade']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Exclui Competidor</h2>
<form method="post">
<input type="hidden" name="excluir_competidor" value="excluir_competidor" /> 
        <select name="excluir_competidor_id">
            <?php foreach ($competidores as $competidor): ?>
                <option value="<?php echo $competidor['id_competidor']; ?>"
                ><?php echo $competidor['nome']; ?>
            </option>
            <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Competidor</button>
            </form>    
</body>
</html>

<?php
$competidorController->exibirListaCompetidor();
?>













