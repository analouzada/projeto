<?php
include_once 'config/config.php';

if (!isset($_GET['id'])) {
    header('Location: listalocalidade.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM localidade WHERE id = ?');
$stmt->execute([$id]);
$localidade = $stmt->fetch(PDO::FETCH_ASSOC);

$rua = $localidade['rua'];
$bairro = $localidade['bairro'];
$numero = $localidade['numero'];
$cep = $localidade['cep'];
$cidade = $localidade['cidade'];
$estado = $localidade['estado'];
$pais = $localidade['pais'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    // Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE localidade SET rua = ?, bairro = ?, numero = ?, cep = ?, cidade = ?, estado = ?, pais = ? WHERE id = ?');
    $stmt->execute([$rua, $bairro, $numero, $cep, $cidade, $estado, $pais, $id]);
    header('Location: listalocalidade.php');
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
            window.location.href = 'controllers/deletarlocalidade.php?id=' + id;
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
    <label>Rua</label>
    <input type="text" name="rua" value="<?php echo $rua; ?>" placeholder="Rua">

    <label>Bairro</label>
    <input type="text" name="bairro" value="<?php echo $bairro; ?>" placeholder="Bairro">

    <label>Número</label>
    <input type="text" name="numero" value="<?php echo $numero; ?>" placeholder="Número">

    <label>CEP</label>
    <input type="text" name="cep" value="<?php echo $cep; ?>" placeholder="CEP">

    <label>Cidade</label>
    <input type="text" name="cidade" value="<?php echo $cidade; ?>" placeholder="Cidade">

    <label>Estado</label>
    <input type="text" name="estado" value="<?php echo $estado; ?>" placeholder="Estado">

    <label>País</label>
    <input type="text" name="pais" value="<?php echo $pais; ?>" placeholder="País">

    <button type="submit">Atualizar</button>
    <a class="lixo" id="delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')">
        <img src="public/assets/img/lixeira.png" width="30px" height="30px">
    </a>
</form>

<div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header"></div>
        <p>Você tem certeza que deseja deletar esta localidade?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>
