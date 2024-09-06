<?php
include_once 'config/config.php';

if (!isset($_GET['id'])) {
    header('Location: listacompetidor.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM competidor WHERE id = ?');
$stmt->execute([$id]);
$competidor = $stmt->fetch(PDO::FETCH_ASSOC);

$nome = $competidor['nome'];
$idade = $competidor['idade'];
$altura = $competidor['altura'];
$peso = $competidor['peso'];
$genero = $competidor['genero'];
$cpf = $competidor['cpf'];
$rg = $competidor['rg'];
$equipe = $competidor['equipe'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $genero = $_POST['genero'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $equipe = $_POST['equipe'];

    // Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE competidor SET nome = ?, idade = ?, altura = ?, peso = ?, genero = ?, cpf = ?, rg = ?, equipe = ? WHERE id = ?');
    $stmt->execute([$nome, $idade, $altura, $peso, $genero, $cpf, $rg, $equipe, $id]);
    header('Location: listacompetidor.php');
    exit;
}
?>
<head>
<style>
        /* Estilo para o diálogo de confirmação */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
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
            confirmBtn.setAttribute('data-id', id); // Set the ID on the button as a data attribute
            modal.style.display = 'block';
            confirmBtn.onclick = function() {
                window.location.href = 'controllers/deletarcompetidor.php?id=' + id;
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
    <input type="text" name="nome" value="<?php echo $nome; ?>" placeholder="Nome">

    <label>Idade</label>
    <input type="text" name="idade" value="<?php echo $idade; ?>" placeholder="Idade">

    <label>Altura</label>
    <input type="text" name="altura" value="<?php echo $altura; ?>" placeholder="Altura">

    <label>Peso</label>
    <input type="text" name="peso" value="<?php echo $peso; ?>" placeholder="Peso">

    <label>Gênero</label>
    <input type="text" name="genero" value="<?php echo $genero; ?>" placeholder="Gênero">

    <label>CPF</label>
    <input type="text" name="cpf" value="<?php echo $cpf; ?>" placeholder="CPF">

    <label>RG</label>
    <input type="text" name="rg" value="<?php echo $rg; ?>" placeholder="RG">

    <label>Equipe</label>
    <input type="text" name="equipe" value="<?php echo $equipe; ?>" placeholder="Equipe">

    <button type="submit">Update</button>
    <a class= "lixo" id= "delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')"><img src="<?php echo 'public/assets/img/lixeira.png' ?>" width="30px" height= "30px"></a>
</form>

<div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header"></div>
        <p>Você tem certeza que deseja deletar este competidor?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>