<?php
include_once 'config/config.php';

if (!isset($_GET['id'])) {
    header('Location: listatreinador.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM treinador WHERE id = ?');
$stmt->execute([$id]);
$treinador = $stmt->fetch(PDO::FETCH_ASSOC);

$nome = $treinador['nome'];
$idade = $treinador['idade'];
$altura = $treinador['altura'];
$peso = $treinador['peso'];
$cpf = $treinador['cpf'];
$rg = $treinador['rg'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    // Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE treinador SET nome = ?, idade = ?, altura = ?, peso = ?, cpf = ?, rg = ? WHERE id = ?');
    $stmt->execute([$nome, $idade, $altura, $peso, $cpf, $rg, $id]);
    header('Location: listatreinador.php');
    exit;
}
?>
<head>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        color: black;
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 300px;
        text-align: center;
        border-radius: 10px;
    }
    .modal-header {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .modal-footer {
        display: flex;
        justify-content: space-between;
    }
    .modal-footer button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-cancel {
        background-color: #ccc;
    }
    .btn-cancel:hover{
        background-color: #ccb;
    }
    .btn-confirm {
        background-color: #f44336;
        color: white;
    }
    .btn-confirm:hover {
        background-color: red;
        color: white;
    }
    .enviar {
        display: flex;
        justify-content: center;
    }
    body {
        overflow-y: hidden;
    }
</style>
<script type="text/javascript">
    function confirmDelete(event, id) {
        event.preventDefault();
        var modal = document.getElementById('confirmModal');
        var confirmBtn = document.getElementById('confirmBtn');
        confirmBtn.setAttribute('data-id', id);
        modal.style.display = 'block';
        confirmBtn.onclick = function() {
            window.location.href = 'controllers/deletartreinador.php?id=' + id;
        }
    }

    function closeModal() {
        var modal = document.getElementById('confirmModal');
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        var modal = document.getElementById('confirmModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
</head>
<form method="post">
    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome">

    <label>Idade</label>
    <input type="text" name="idade" value="<?php echo htmlspecialchars($idade); ?>" placeholder="Idade">

    <label>Altura</label>
    <input type="text" name="altura" value="<?php echo htmlspecialchars($altura); ?>" placeholder="Altura">

    <label>Peso</label>
    <input type="text" name="peso" value="<?php echo htmlspecialchars($peso); ?>" placeholder="Peso">

    <label>CPF</label>
    <input type="text" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>" placeholder="CPF">

    <label>RG</label>
    <input type="text" name="rg" value="<?php echo htmlspecialchars($rg); ?>" placeholder="RG">

    <button type="submit">Atualizar</button>
    <a class="lixo" id="delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')">
        <img src="public/assets/img/lixeira.png" width="30px" height="30px">
    </a>
</form>

<div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header"></div>
        <p>Você tem certeza que deseja deletar este treinador?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>
