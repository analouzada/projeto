<!DOCTYPE html>
<html>
<head>
    <title>Lista de Competidores</title>
</head>
<body>
    <h1>Lista de Competidores</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Peso</th>
            <th>Altura</th>
            <th>Gênero</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Equipe</th>
        </tr>
        <?php foreach ($competidores as $competidor): ?>
            <tr>
                <td><?php echo $competidor['id']; ?></td>
                <td><?php echo $competidor['nome']; ?></td>
                <td><?php echo $competidor['idade']; ?></td>
                <td><?php echo $competidor['peso']; ?></td>
                <td><?php echo $competidor['altura']; ?></td>
                <td><?php echo $competidor['genero']; ?></td>
                <td><?php echo $competidor['cpf']; ?></td>
                <td><?php echo $competidor['rg']; ?></td>
                <td><?php echo $competidor['equipe']; ?></td>
                <?php
                                echo "<td><a class='btn-editar' style='color:blue;'
                                href='atualizarcompetidor.php?id={$competidor['id']}'>Atualizar</a></td>";

                            ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

