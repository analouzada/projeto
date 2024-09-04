<?php
require_once 'config.php';
require_once 'controllers/EsporteController.php';
require_once 'controllers/CompetidorController.php';
require_once 'controllers/TreinadorController.php';

//Controller dos esportes
$esporteController = new EsporteController($pdo);

if (isset($_POST['modalidade']) && 
    isset($_POST['ano_olimpiada'])) 
{
    $esporteController->criarEsporte($_POST['modalidade'], $_POST['ano_olimpiada']);
}

$esportes = $esporteController->listarEsportes();
if (isset($_POST['excluir_esporte_id'])) {
    $esporteController->excluirEsporte($_POST['excluir_esporte_id']);
}
if (isset($_POST['atualizar_modalidade']) && isset($_POST['atualizar_ano_olimpiada']) && isset($_POST['esporte_id'])) {
    $esporteController->atualizarEsporte($_POST['esporte_id'], $_POST['atualizar_modalidade'], $_POST['atualizar_ano_olimpiada']);
}

//Controller dos competidores
$competidorController = new CompetidorController($pdo);

if (isset($_POST['nome']) && 
    isset($_POST['idade']) && 
    isset($_POST['peso']) && 
    isset($_POST['altura']) && 
    isset($_POST['nacionalidade'])) 
{
    $competidorController->criarCompetidor($_POST['nome'], $_POST['idade'], $_POST['peso'], $_POST['altura'], $_POST['nacionalidade']);
}

$competidores = $competidorController->listarCompetidor();

if (isset($_POST['excluir_competidor_id'])) {
    $competidorController->excluirCompetidor($_POST['excluir_competidor_id']);
}
if (isset($_POST['atualizar_nome']) && isset($_POST['atualizar_idade']) && isset($_POST['atualizar_peso']) && isset($_POST['atualizar_altura']) && isset($_POST['atualizar_nacionalidade']) && isset($_POST['competidor_id'])) {
    $competidorController->atualizarCompetidor($_POST['competidor_id'], $_POST['atualizar_nome'], $_POST['atualizar_idade'], $_POST['atualizar_peso'], $_POST['atualizar_altura'], $_POST['atualizar_nacionalidade'],);
}
//Controller dos treinadores
$treinadorController = new TreinadorController($pdo);

if (isset($_POST['nome']) && 
    isset($_POST['idade']) && 
    isset($_POST['nacionalidade'])) 
{
    $treinadorController->criarTreinador($_POST['nome'], $_POST['idade'], $_POST['nacionalidade']);
}

$treinadores = $treinadorController->listarTreinador();
if (isset($_POST['excluir_treinador_id'])) {
    $treinadorController->excluirTreinador($_POST['excluir_treinador_id']);
}
if (isset($_POST['atualizar_nome']) && isset($_POST['atualizar_idade']) && isset($_POST['atualizar_nacionalidade']) && isset($_POST['treinador_id'])) {
    $treinadorController->atualizarTreinador($_POST['treinador_id'], $_POST['atualizar_nome'], $_POST['atualizar_idade'], $_POST['atualizar_nacionalidade'],);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD com MVC e PDO</title>
</head>
<body>
    <h1>Esportes</h1>
    <form method="post">
        <input type="text" name="modalidade" placeholder="Modalidade">
        <input type="text" name="ano_olimpiada" placeholder="Ano da Olimpíada">
        <button type="submit">Adicionar Esporte</button>
    </form>

  <?php
$esporteController->exibirListaEsportes();

?>
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

    <h2>Excluir Esporte</h2>
    <form method="post">
        <select name="excluir_esporte_id">
            <?php foreach ($esportes as $esporte): ?>
                <option value="<?php echo $esporte['id_esporte']; ?>">
                               <?php echo $esporte['modalidade']; ?>
            </option>
            <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Esporte</button>
            </form>
  
    
    <!--Cadastro Competidor -->
    <h1>Competidores</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="idade" placeholder="Idade">
        <input type="text" name="peso" placeholder="Peso">
        <input type="text" name="altura" placeholder="Altura">
        <input type="text" name="nacionalidade" placeholder="Nacionalidade">

        <button type="submit">Adicionar Competidor</button>
    </form>

    <?php
$competidorController->exibirListaCompetidor();
?>
<h2>Atualizar Competidor</h2>
    <form method="post">
        <select ame="competidor_id">
        <?php foreach ($competidores as $competidor): ?>
                                <option value="<?php echo $competidor['id_competidor']; ?>"><?php echo $competidor['id_competidor']; ?></option>
                                <?php endforeach; ?>  
        <input type="hidden" name="competidor_id"  value="<?php echo $competidor['id_competidor']; ?>">

        </select>
                <input type="text" name="atualizar_nome" placeholder="Novo Nome">
        <input type="text" name="atualizar_idade" placeholder="Nova Idade">
        <input type="text" name="atualizar_peso" placeholder="Novo Peso">
        <input type="text" name="atualizar_altura" placeholder="Nova Altura">
        <input type="text" name="atualizar_nacionalidade" placeholder="Nova Nacionalidade">
        <button type="submit">Atualizar Competidor</button>
    </form>

    <h2>Excluir Competidor</h2>
    <form method="post">
        <select name="excluir_competidor_id">
            <?php foreach ($competidores as $competidor): ?>
                <option value="<?php echo $competidor['id_competidor']; ?>">
                               <?php echo $competidor['nome']; ?>
            </option>
            <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Competidor</button>
            </form>
    <!--Cadastro Treinador -->
    <h1>Treinadores</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="idade" placeholder="Idade">
        <input type="text" name="nacionalidade" placeholder="Nacionalidade">

        <button type="submit">Adicionar Treinador</button>
    </form>
<?php
$treinadorController->exibirListaTreinador();
?>
<h2>Atualizar Treinador</h2>
    <form method="post">
        <select ame="treinador_id">
        <?php foreach ($treinadores as $treinador): ?>
                                <option value="<?php echo $treinador['id_treinador']; ?>"><?php echo $treinador['id_treinador']; ?></option>
                                <?php endforeach; ?>  
        <input type="hidden" name="treinador_id"  value="<?php echo $treinador['id_treinador']; ?>">

        </select>
                <input type="text" name="atualizar_nome" placeholder="Novo Nome">
        <input type="text" name="atualizar_idade" placeholder="Nova Idade">
        <input type="text" name="atualizar_nacionalidade" placeholder="Nova Nacionalidade">
        <button type="submit">Atualizar Treinador</button>
    </form>

    <h2>Excluir Treinador</h2>
    <form method="post">
        <select name="excluir_treinador_id">
            <?php foreach ($treinadores as $treinador): ?>
                <option value="<?php echo $treinador['id_treinador']; ?>">
                               <?php echo $treinador['nome']; ?>
            </option>
            <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Treinador</button>
            </form>
</body>
</html>